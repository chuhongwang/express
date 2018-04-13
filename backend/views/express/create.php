<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Express */

$this->title = '添加快递';
$this->params['breadcrumbs'][] = ['label' => '快递信息', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="express-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
