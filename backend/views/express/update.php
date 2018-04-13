<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Express */

$this->title = '编辑信息';
$this->params['breadcrumbs'][] = ['label' => '快递信息', 'url' => ['index']];
$this->params['breadcrumbs'][] = '编辑信息';
?>
<div class="express-update">

    <?= $this->render('_update_form', [
        'model' => $model,
    ]) ?>

</div>
