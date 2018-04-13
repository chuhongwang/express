<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ExpressSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="express-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'express_number') ?>

    <?= $form->field($model, 'state') ?>

    <?= $form->field($model, 'post_address') ?>

    <?= $form->field($model, 'receive_address') ?>

    <?php // echo $form->field($model, 'post_name') ?>

    <?php // echo $form->field($model, 'receive_name') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'post_phone') ?>

    <?php // echo $form->field($model, 'receive_phone') ?>

    <?php // echo $form->field($model, 'point_id') ?>

    <?php // echo $form->field($model, 'next_point_id') ?>

    <?php // echo $form->field($model, 'create_time') ?>

    <?php // echo $form->field($model, 'update_time') ?>

    <?php // echo $form->field($model, 'delete_time') ?>

    <?php // echo $form->field($model, 'delete_flag') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
