<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Employee */

$this->title = '添加员工';
$this->params['breadcrumbs'][] = ['label' => '员工信息', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
