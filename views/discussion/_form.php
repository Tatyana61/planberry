<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Discussion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="discussion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_project')->textInput() ?>



    <?= $form->field($model, 'disc_name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'discription')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
