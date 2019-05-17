<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Ticket */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ticket-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_project')->textInput() ?>

    <?= $form->field($model, 'id_user')->textInput() ?>

    <?= $form->field($model, 'id_status')->dropDownList([ 'new' => 'New', 'closed' => 'Closed', 'cancelled' => 'Cancelled', 'resolved' => 'Resolved', 'fixed' => 'Fixed', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'type')->dropDownList([ 'request a change' => 'Request a change', 'report a bug' => 'Report a bug', 'ask a question' => 'Ask a question', 'raise an issue' => 'Raise an issue', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'subject')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ticket_desc')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
