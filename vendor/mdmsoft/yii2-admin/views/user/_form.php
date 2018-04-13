<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\ultron\UmpDict;

/* @var $this yii\web\View */
/* @var $model mdm\admin\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'status')->dropDownList([0 => 'Inactive',10 => 'Active']) ?>
    <?= $form->field($model, 'email')->textInput() ?>
    <?= $form->field($model, 'pass')->passwordInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('rbac-admin', 'Create') : Yii::t('rbac-admin', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>