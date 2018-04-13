<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\HistoryRecord */

$this->title = 'Create History Record';
$this->params['breadcrumbs'][] = ['label' => 'History Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="history-record-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
