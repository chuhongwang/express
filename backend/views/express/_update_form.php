<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Express */
/* @var $form yii\widgets\ActiveForm */
$point=\common\models\Point::find()->andFilterWhere(['delete_flag'=>1])->asArray()->all();
$arr=[];
foreach ($point as $k=>$value){
    $arr[$value['id']]=$value['name'];
}
?>

<div class="express-form">

    <?php $form = ActiveForm::begin([
        'action' => 'update',
        'method' => 'post',
        'id' => 'form_id'
    ]); ?>
    <?= $form->field($model, 'state')->dropDownList(Yii::$app->params['status']) ?>

    <?= $form->field($model, 'point_id')->dropDownList($arr) ?>

    <?= $form->field($model, 'next_point_id')->dropDownList($arr) ?>

    <div class="form-group">
        <?= Html::submitButton('编辑', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
