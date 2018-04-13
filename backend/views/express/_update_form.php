<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Express */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="express-form">

    <?php $form = ActiveForm::begin([
        'action' => 'update',
        'method' => 'post',
        'id' => 'form_id'
    ]); ?>

    <?= $form->field($model, 'post_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'receive_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'post_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'receive_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'post_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'receive_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'point_id')->textInput() ?>

    <?= $form->field($model, 'next_point_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('编辑', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
