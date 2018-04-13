<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '登陆';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login" style="margin-top:100px">
    <div class="row">
        <div class="col-lg-7">
            <img style="max-width: 600px"
                 src="http://bpic.588ku.com/back_pic/00/08/53/17562a43dac4e41.jpg!/fh/300/quality/90/unsharp/true/compress/true"
                 alt="永利宝金融P2P投资理财平台" class="img-rounded">
        </div>
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
            <div class="row">
                <div class="col-lg-3 right" style="margin-top:10px">
                    <?= Html::label('登录邮箱') ?>
                </div>
                <div class="col-lg-9">
                    <?= $form->field($model, 'email')->label(false)->textInput(['autofocus' => true]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 right" style="margin-top:10px">
                    <?= Html::label('登录密码') ?>
                </div>
                <div class="col-lg-9">
                    <?= $form->field($model, 'password')->label(false)->passwordInput() ?>
                    <?php
                    if (!empty($err_msg)) {
                        echo '<p class="help-block help-block-error" style="color: #a94442" >' . $err_msg . '</p>';
                    }
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 right">
                </div>
                <div class="col-lg-9">
                    <?= Html::submitButton('登陆', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            </div>
            <div style="color:#999;margin:1em 0">
                如忘记密码，请联系永利宝人员重置
            </div>

            <?php ActiveForm::end(); ?>
        </div>

    </div>
</div>
