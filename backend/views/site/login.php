<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */


use yii\captcha\Captcha;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use backend\assets\AppAsset;

$this->title = '用户登录';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="middle-box text-center loginscreen animated fadeInDown">
    <div class="row">
        <div class="form-group">
        </div>
        <h3>欢迎来到快递信息管理系统 </h3>
        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
        <div class="form-group">
            <?= $form->field($model, 'username')->label(FALSE)->textInput(['required' => "", 'placeholder' => '账号', 'class' => 'form-control']) ?>
        </div>
        <div class="form-group">
            <?= $form->field($model, 'password')->label(FALSE)->passwordInput(['required' => "", 'placeholder' => '登录密码', 'class' => 'form-control']) ?>
        </div>
        <?= Html::submitButton('登录', ['class' => 'btn btn-primary block full-width m-b', 'name' => 'login-button']) ?>

        <?php ActiveForm::end(); ?>
    </div>
    <hr/>
    <div class="row">
        <?= AppAsset::footer() ?>
    </div>

</div>

