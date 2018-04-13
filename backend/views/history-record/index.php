<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\HistoryRecordSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'History Records';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="history-record-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create History Record', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'state',
            'date',
            'express_id',
            'point',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
