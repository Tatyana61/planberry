<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TicketSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ticket-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_tickets') ?>

    <?= $form->field($model, 'id_project') ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'id_status') ?>

    <?= $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'subject') ?>

    <?php // echo $form->field($model, 'ticket_desc') ?>

    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Сброс', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
