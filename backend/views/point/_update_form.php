<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Point */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="point-form">

    <?php $form = ActiveForm::begin([
        'action' => '/point/update',
        'method' => 'get',
        'id' => 'form_id',
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'id')->label(false)->hiddenInput() ?>
    <div class="form-group">
        <?= Html::submitButton('编辑', ['class' =>'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
