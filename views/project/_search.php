<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_project') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'pr_name') ?>

    <?= $form->field($model, 'pr_type') ?>

    <?= $form->field($model, 'pr_sratus') ?>

    <?php // echo $form->field($model, 'pr_desc') ?>

    <?php // echo $form->field($model, 'pr_update') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
