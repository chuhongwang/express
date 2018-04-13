<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Express */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="express-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'express_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'state')->textInput() ?>

    <?= $form->field($model, 'post_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'receive_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'post_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'receive_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'post_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'receive_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'point_id')->textInput() ?>

    <?= $form->field($model, 'next_point_id')->textInput() ?>

    <?= $form->field($model, 'create_time')->textInput() ?>

    <?= $form->field($model, 'update_time')->textInput() ?>

    <?= $form->field($model, 'delete_time')->textInput() ?>

    <?= $form->field($model, 'delete_flag')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
