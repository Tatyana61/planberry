<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TaskSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_task') ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'id_project') ?>

    <?= $form->field($model, 'task_name') ?>

    <?= $form->field($model, 'priority') ?>

    <?php // echo $form->field($model, 'task_status') ?>

    <?php // echo $form->field($model, 'assigned_to') ?>

    <?php // echo $form->field($model, 'task_desc') ?>

    <?php // echo $form->field($model, 'start_date') ?>

    <?php // echo $form->field($model, 'create_date') ?>

    <?php // echo $form->field($model, 'finish_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Сброс', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
