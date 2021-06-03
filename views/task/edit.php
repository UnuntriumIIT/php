<?php

use app\domain\entity\CommentEntity;
use app\domain\entity\CostEntity;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\domain\entity\TaskEntity*/
/* @var $comment CommentEntity */
/* @var $cost CostEntity */
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
<h3>Редактирование задачи №<?= $model->getId() ?></h3><hr>
<div class="tasks-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true])->label('Название') ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'author')->textInput() ?>

    <?= $form->field($model, 'status[id]')->dropDownList($statuses) ?>

    <?= $form->field($model, 'type[id]')->dropDownList($types) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить изменения', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <h3>Комментарии:</h3>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">Комментарий</th>
            <th scope="col">Автор комментария</th>
            <th scope="col">Дата комментария</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($model->getComments() as $item) {
            echo '<tr>
            <td>' . $item->getText() . '</td>
            <td>' . $item->getAuthor() . '</td>
            <td>' . $item->getDate() . '</td>
        </tr>';
        }
        ?>
        </tbody>
    </table>

    <?php $form = ActiveForm::begin(['id' => 'addComment', 'action' =>['/task/' . $model->id . '/comment/create']]);?>
    <div class="field"><?= Html::activeTextInput($comment, 'author', ['class'=>'form-item', 'placeholder'=>'Имя автора']) ?></div>
    <div class="field"><?= Html::activeTextarea($comment, 'text', ['class'=>'form-item', 'placeholder'=>'Ваш комментарий', 'rows'=>4, 'cols'=>50]) ?></div>
    <div class="form-btn">
        <div class="field"><?= Html::submitButton(Yii::t('app', 'Отправить'), ['class' => 'btn btn-primary']) ?></div>
    </div>
    <?php ActiveForm::end(); ?>


<h3>Трудозатраты:</h3>
<?php $form = ActiveForm::begin(['id' => 'addCost', 'action' =>['/task/' . $model->id . '/cost/create']]);?>
    <div class="field"><?= Html::activeTextarea($cost, 'text', ['class'=>'form-item', 'placeholder'=>'Описание', 'rows'=>4, 'cols'=>50]) ?></div>
    <div class="field"><?= Html::activeTextInput($cost, 'cost', ['class'=>'form-item', 'placeholder'=>'Кол-во часов']) ?></div>
    <div class="form-btn">
        <div class="field"><?= Html::submitButton(Yii::t('app', 'Отправить'), ['class' => 'btn btn-primary']) ?></div>
    </div>
<?php ActiveForm::end(); ?>
    <br/>
<?php foreach ($model->getCosts() as $item) {
    echo '<p>Кол-во часов: '. $item->getCost() .'</p>
            <p>Описание: '. $item->getText() .'</p><br/>';
}?>
</div>
