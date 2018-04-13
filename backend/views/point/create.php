<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Point */

$this->title = '添加网点';
$this->params['breadcrumbs'][] = ['label' => '网点信息', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="point-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
