<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Express */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Expresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="express-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'express_number',
            'state',
            'post_address',
            'receive_address',
            'post_name',
            'receive_name',
            'price',
            'post_phone',
            'receive_phone',
            'point_id',
            'next_point_id',
            'create_time',
            'update_time',
            'delete_time',
            'delete_flag',
        ],
    ]) ?>

</div>
