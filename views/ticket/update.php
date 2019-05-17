<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ticket */

$this->title = 'Обновление тикета: ' . $model->id_tickets;
$this->params['breadcrumbs'][] = ['label' => 'Tickets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tickets, 'url' => ['view', 'id' => $model->id_tickets]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="ticket-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
