<?php
/**
 * @var $dataProvider ArrayDataProvider
 * @var $searchModel TaskSearchModel
 * @var $statusList array
 * @var $typeList array
 */

use app\domain\searchModel\TaskSearchModel;
use yii\data\ArrayDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;

$statuses = $types = [];
foreach ($statusList as $item) {
    $statuses[$item->getId()] = $item->getName();
}
foreach ($typeList as $item) {
    $types[$item->getId()] = $item->getName();
}

?>
    <h3>Общий список задач</h3><hr>
<?php
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        'id',
        'title',
        [
            'attribute' => 'description',
            'label' => 'Описание задачи',
        ],
        'author',
        [
            'label' => 'Статус',
            'attribute' => 'status.name',
            'filter'=> Html::activeDropDownList($searchModel, 'status', $statuses,['class'=>'form-control','prompt' => 'All'])
        ],
        [
            'label' => 'Тип',
            'attribute' => 'type.name',
            'filter'=> Html::activeDropDownList($searchModel, 'type', $types,['class'=>'form-control','prompt' => 'All'])
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'headerOptions' => ['style' => 'width:7%'],
            'buttons'=> [
                    'view' => function ($url, $model, $key) {
                        return Html::a( '', '/task/view?id='.$model->id, ['class'=>'glyphicon glyphicon-eye-open']);
                    },
                    'update'=> function ($url, $model, $key) {
                        return Html::a( '', '/task/update?id='.$model->id, ['class'=>'glyphicon glyphicon-pencil']);
                    },
                    'delete'=> function ($url, $model, $key) {
                        return Html::a( '', '/task/delete/'.$model->id, ['class'=>'glyphicon glyphicon-trash']);
                    },],
        ],
    ],
]);