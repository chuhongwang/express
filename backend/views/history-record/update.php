<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\HistoryRecord */

$this->title = 'Update History Record: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'History Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="history-record-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
