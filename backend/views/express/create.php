<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Express */

$this->title = 'Create Express';
$this->params['breadcrumbs'][] = ['label' => 'Expresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="express-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
