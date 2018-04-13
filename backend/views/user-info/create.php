<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\InquiryLog */

$this->title = 'Create Inquiry Log';
$this->params['breadcrumbs'][] = ['label' => 'Inquiry Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inquiry-log-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
