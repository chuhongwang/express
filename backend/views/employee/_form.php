<?php

use backend\assets\AppAsset;
use common\components\DateSelectHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Employee */
/* @var $form yii\widgets\ActiveForm */
$point=\common\models\Point::find()->andFilterWhere(['delete_flag'=>1])->asArray()->all();
$arr=[];
foreach ($point as $k=>$value){
    $arr[$value['id']]=$value['name'];
}
?>

<div class="employee-form">

    <?php $form = ActiveForm::begin([
            'action'=>'/employee/create',
        'method'=>'get',
        'id'=>'form_id'
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gender')->radioList([1=>'男',2=>'女'])->label('性别') ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    <?php
    DateSelectHelper::CheckDatesBoxs($model->birthday, 'EmployeeSearch[birthday]', '生日');
    ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pointId')->dropDownList($arr) ?>

    <div class="form-group">
        <?= Html::submitButton('添加' , ['class' =>'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
AppAsset::addScript($this, '@web/js/plugins/datapicker/bootstrap-datetimepicker.js');
AppAsset::addScript($this, '@web/js/plugins/datapicker/bootstrap-datetimepicker.zh-CN.js');
?>
