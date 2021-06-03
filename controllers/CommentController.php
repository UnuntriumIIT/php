<?php

namespace app\controllers;

use app\domain\dto\CommentDto;
use app\domain\service\CommentService;
use app\infrastructure\repository\CommentRepository;
use app\infrastructure\repository\TaskRepository;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;

/**
 * Контроллер задач
 */
class CommentController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'create' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * @return string
     * @throws \yii\base\InvalidConfigException
     */
    public function actionCreate(int $taskId)
    {
        $request = \Yii::$app->request;
        $params = $request->getBodyParams();
        $dto = new CommentDto();
        $dto->text = $params['CommentEntity']['text'];
        $dto->taskId = $taskId;
        $dto->author = $params['CommentEntity']['author'];

        $commentService = new CommentService(new CommentRepository);
        $commentService->save($dto);
        Yii::$app->session->setFlash('success', "Комментарий добавлен.");
        $this->redirect('/task/update?id='.$taskId);
        return '';
    }
}
