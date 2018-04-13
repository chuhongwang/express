<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Express */
/* @var $form yii\widgets\ActiveForm */
$point = \common\models\Point::find()->andFilterWhere(['delete_flag' => 1])->asArray()->all();
$arr = [];
foreach ($point as $k => $value) {
    $arr[$value['id']] = $value['name'];
}
?>

<div class="express-form">

    <?php $form = ActiveForm::begin([
        'action' => 'create',
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

    <?= $form->field($model, 'point_id')->dropDownList($arr) ?>

    <?= $form->field($model, 'next_point_id')->dropDownList($arr) ?>

    <div class="form-group">
        <?= Html::submitButton('添加',['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
