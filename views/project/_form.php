<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;




/* @var $this yii\web\View */
/* @var $model app\models\Project */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_user')->textInput() ?>

    <?= $form->field($model, 'pr_name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'pr_type')->dropDownList([ 'new' => 'New', 'support' => 'Support', 'internal' => 'Internal', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'pr_sratus')->dropDownList([ 'open' => 'Open', 'on hold' => 'On hold', 'closed' => 'Closed', 'cancelled' => 'Cancelled', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'pr_desc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'pr_update')->  widget(DatePicker::className(),[
        'options' => ['placeholder' => 'Enter birth date ...'],
        'pluginOptions' => [
            'autoclose'=>true
        ]]) ?>





    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
