<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = '安全设置';
?>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h3>
                    安全设置
                </h3>
            </div>
            <div class="ibox-content">
                <h4>登录密码</h4>
                <p>定期修改密码是个好习惯哦~</p>
                <div class="row">

                    <div class="col-lg-5">
                        <div class="ibox float-e-margins">
                            <div class="ibox-content">
                                <?php $form = ActiveForm::begin(['id' => 'secure-form', 'class' => 'form-horizontal']); ?>
                                <div class="form-group">
                                    <?= $form->field($model, 'oldPassword')->label(FALSE)->passwordInput(['required' => "", 'placeholder' => '输入旧密码', 'class' => 'form-control']) ?>
                                </div>
                                <div class="form-group">
                                    <?= $form->field($model, 'newPassword')->label(FALSE)->passwordInput(['required' => "", 'placeholder' => '输入新密码', 'class' => 'form-control']) ?>
                                </div>
                                <div class="form-group">
                                    <?= $form->field($model, 'confirmPassword')->label(FALSE)->passwordInput(['required' => "", 'placeholder' => '确认新密码', 'class' => 'form-control']) ?>
                                </div>

                                <?= Html::submitButton('确认', ['class' => 'btn btn-primary block full-width m-b', 'name' => 'submit-button']) ?>

                                <?php ActiveForm::end(); ?>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>