<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Task */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_user')->textInput() ?>

    <?= $form->field($model, 'id_project')->textInput() ?>

    <?= $form->field($model, 'task_name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'priority')->dropDownList([ 'low' => 'Low', 'medium' => 'Medium', 'hight' => 'Hight', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'task_status')->dropDownList([ 'open' => 'Open', 're-open' => 'Re-open', 'on hold' => 'On hold', 'completed' => 'Completed', 'cancelled' => 'Cancelled', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'assigned_to')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'task_desc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'start_date')->widget(DatePicker::className(),[
        'options' => ['placeholder' => 'Enter birth date ...'],
        'pluginOptions' => [
            'autoclose'=>true
        ]]) ?>

    <?= $form->field($model, 'create_date')->widget(DatePicker::className(),[
        'options' => ['placeholder' => 'Enter birth date ...'],
        'pluginOptions' => [
            'autoclose'=>true
        ]]) ?>

    <?= $form->field($model, 'finish_date')->widget(DatePicker::className(),[
        'options' => ['placeholder' => 'Enter birth date ...'],
        'pluginOptions' => [
            'autoclose'=>true
        ]]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
