<?php


namespace app\controllers;


use app\domain\dto\CostDto;
use app\domain\service\CostService;
use app\infrastructure\repository\CostRepository;
use Yii;
use yii\base\InvalidConfigException;
use yii\filters\VerbFilter;
use yii\web\Controller;

class CostController extends Controller
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
     * @param int $taskId
     * @return string
     * @throws InvalidConfigException
     */
    public function actionCreate(int $taskId): string
    {
        $request = Yii::$app->request;
        $params = $request->getBodyParams();
        $dto = new CostDto();
        $dto->taskId = $taskId;
        $dto->text = $params['CostEntity']['text'];
        $dto->cost = $params['CostEntity']['cost'];

        $costService = new CostService(new CostRepository);
        $costService->save($dto);
        Yii::$app->session->setFlash('success', "Добавлено.");
        $this->redirect('/task/update?id='.$taskId);
        return '';
    }
}