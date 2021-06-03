<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Task */
/* @var $form yii\widgets\ActiveForm */
/* @var $statusList array */
/* @var $typeList array */

$statuses = $types = [];
foreach ($statusList as $item) {
    $statuses[$item->getId()] = $item->getName();
}
foreach ($typeList as $item) {
    $types[$item->getId()] = $item->getName();
}
?>
<h3>Создание задачи</h3><hr>
<div class="tasks-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status[id]')->dropDownList($statuses) ?>

    <?= $form->field($model, 'type[id]')->dropDownList($types) ?>

    <?= $form->field($model, 'author')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('ТЫК', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>