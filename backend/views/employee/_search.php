<?php

use common\components\DateSelectHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\EmployeeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employee-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-sm-1">
            <?= $form->field($model, 'id')->label(false)->textInput(['placeholder'=>'ID']) ?>
        </div>
        <div class="col-sm-1">
            <?= $form->field($model, 'name')->label(false)->textInput(['placeholder'=>'姓名']) ?>
        </div>
        <div class="col-sm-1">
            <?= $form->field($model, 'gender')->label(false)->textInput(['placeholder'=>'性别']) ?>
        </div>
        <div class="col-sm-1">
            <?= $form->field($model, 'phone')->label(false)->textInput(['placeholder'=>'电话']) ?>
        </div>
        <div class="col-sm-1">
            <?= $form->field($model, 'email')->label(false)->textInput(['placeholder'=>'邮箱']) ?>
        </div>
        <div class="col-sm-2">
            <?php
            DateSelectHelper::CheckDatesBoxs($model->birthday, 'EmployeeSearch[birthday]', '生日');
            ?>
        </div>
        <div class="col-sm-1">
            <?= $form->field($model, 'address')->label(false)->textInput(['placeholder'=>'现居地址']) ?>
        </div>
        <div class="col-sm-1">
            <?= $form->field($model, 'pointId')->label(false)->textInput(['placeholder'=>'所在网点']) ?>
        </div>
        <div class="form-group">
            <?= Html::submitButton('查询', ['class' => 'btn btn-success']) ?>
        </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>
