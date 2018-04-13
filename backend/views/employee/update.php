<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Employee */

$this->title = '编辑信息: ';
$this->params['breadcrumbs'][] = ['label' => '员工信息', 'url' => ['index']];
$this->params['breadcrumbs'][] = '编辑信息';
?>
<div class="employee-update">

    <?= $this->render('_updata_form', [
        'model' => $model,
    ]) ?>

</div>
