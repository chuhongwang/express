<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Point */

$this->title = '编辑网点';
$this->params['breadcrumbs'][] = ['label' => '网点信息', 'url' => ['index']];
$this->params['breadcrumbs'][] = '编辑网点';
?>
<div class="point-update">

    <?= $this->render('_update_form', [
        'model' => $model,
    ]) ?>

</div>
