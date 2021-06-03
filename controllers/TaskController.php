<?php

namespace app\controllers;

use app\domain\dto\TaskDto;
use app\domain\fabric\CommentFabric;
use app\domain\fabric\CostFabric;
use app\domain\fabric\TaskFabric;
use app\domain\searchModel\TaskSearchModel;
use app\domain\service\CostService;
use app\domain\service\TaskService;
use app\infrastructure\repository\CostRepository;
use app\infrastructure\repository\StatusRepository;
use app\infrastructure\repository\TaskRepository;
use app\infrastructure\repository\TypeRepository;
use Yii;
use yii\base\InvalidConfigException;
use yii\data\ArrayDataProvider;
use yii\web\Controller;
use yii\filters\VerbFilter;

/**
 * Контроллер задач
 */
class TaskController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors(): array
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'list' => ['GET'],
                ],
            ],
        ];
    }

    /**
     * @return string
     */
    public function actionList(): string
    {
        $searchModel = new TaskSearchModel();
        $searchModel->load(Yii::$app->request->getQueryParams());

        $taskService = new TaskService(
            new TaskRepository,
            new StatusRepository(),
            new TypeRepository()
        );
        $statusList = $taskService->getStatusList();
        $typeList = $taskService->getTypeList();
        $dataProvider = new ArrayDataProvider(['allModels' => $taskService->findAll(array_filter($searchModel->attributes)), 'pagination' => ['pageSize' => 10]]);
        return $this->render('list', compact('dataProvider', 'searchModel', 'statusList', 'typeList'));
    }

    /**
     * @return string
     * @throws InvalidConfigException
     */
    public function actionCreate(): string
    {
        $request = Yii::$app->request;
        $taskService = new TaskService(
            new TaskRepository,
            new StatusRepository(),
            new TypeRepository()
        );

        if ($request->isPost) {
            // инициализируем dto данными из POST
            $taskService->save(new TaskDto($request->getBodyParams()['TaskEntity']));
            $id = Yii::$app->db->getLastInsertID();
            $this->redirect('/task/view?id='.$id);
            return '';
        } else {
            $model = TaskFabric::empty();

            $statusList = $taskService->getStatusList();
            $typeList = $taskService->getTypeList();
            return $this->render('create', compact('model', 'statusList', 'typeList'));
        }
    }

    public function actionView(): string
    {
        $request = Yii::$app->request;
        $id = $request->get('id');
        $taskService = new TaskService(
            new TaskRepository(),
            new StatusRepository(),
            new TypeRepository()
        );
        $model = $taskService->findByPk($id);
        $title = $model->getTitle();
        $description = $model->getDescription();
        $type = $model->getType()->getName();
        $status = $model->getStatus()->getName();
        $comment = CommentFabric::instance(['taskId' => $model->getId()]);
        $comments = $model->getComments();
        $author = $model->getAuthor();
        $costs = $model->getCosts();
        return $this->render('view', compact('title',
            'type','status','description','comment',
            'comments', 'model', 'author', 'costs'));
    }

    /**
     * @param int $id
     * @return string
     * @throws InvalidConfigException
     */
    public function actionUpdate(int $id): string
    {
        $request = Yii::$app->request;
        $taskService = new TaskService(
            new TaskRepository,
            new StatusRepository(),
            new TypeRepository()
        );

        if ($request->isPost) {
            $taskService->save(new TaskDto(array_merge($request->getBodyParams()['TaskEntity'], ['id' => $id])));
            Yii::$app->session->setFlash('success', "Задача обновлена.");
            $this->redirect('/task/view?id='.$id);
            return '';
        } else {
            $model = $taskService->findByPk($id);
            $statusList = $taskService->getStatusList();
            $typeList = $taskService->getTypeList();
            $comment = CommentFabric::empty();
            $cost = CostFabric::empty();
            return $this->render('edit', compact('model', 'statusList', 'typeList', 'comment', 'cost'));
        }
    }

    /**
     * @param int $id
     * @return string
     */
    public function actionDelete(int $id): string
    {
        $taskService = new TaskService(
            new TaskRepository,
            new StatusRepository(),
            new TypeRepository()
        );
        $taskService->delete($id);
        Yii::$app->session->setFlash('warning', "Задача удалена.");
        $this->redirect('/task/list');
        return '';
    }
}
