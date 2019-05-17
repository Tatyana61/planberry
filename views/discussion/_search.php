<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DiscussionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="discussion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_disc') ?>

    <?= $form->field($model, 'id_project') ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'disc_name') ?>

    <?= $form->field($model, 'discription') ?>

    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Сброс', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
