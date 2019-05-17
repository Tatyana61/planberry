<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Discussion */

$this->title = 'Обновить: ' . $model->id_disc;
$this->params['breadcrumbs'][] = ['label' => 'Обсуждения', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_disc, 'url' => ['view', 'id' => $model->id_disc]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="discussion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
