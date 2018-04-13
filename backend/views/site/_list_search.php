<?php
/**
 * Created by PhpStorm.
 * User: CHW
 * Date: 2018/3/8
 * Time: 15:38
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;


?>

<?php $form = ActiveForm::begin([
    'action' => '/site/user-list',
    'method' => 'get',
    'id' => 'form_id',
    'enableClientScript'=>false,
]); ?>

<div class="row">
    <div class="col-lg-2">
        <?= $form->field($model, 'ui_id')->label(false)->textInput(['placeholder' => '编号']) ?>
    </div>
    <div class="col-lg-2">
        <?= $form->field($model, 'username')->label(false)->textInput(['placeholder' => '姓名']) ?>
    </div>
    <div class="col-lg-2">
        <?= $form->field($model, 'id_number')->label(false)->textInput(['placeholder' => '身份证号']) ?>
    </div>
    <div class="col-lg-2">
        <?= $form->field($model, 'phone')->label(false)->textInput(['placeholder' => '手机号']) ?>
    </div>
    <div class="col-lg-2">
        <?= $form->field($model, 'age')->label(false)->textInput(['placeholder' => '年龄']) ?>
    </div>
</div>
<div class="row">
    <div class="col-lg-2">
        <?= $form->field($model, 'sex')->label(false)->dropDownList([0=>'全部',1=>'男',2=>'女'],['prompt'=>'性别']) ?>
    </div>
    <div class="col-lg-2">
        <?= $form->field($model, 'height')->label(false)->textInput(['placeholder' => '身高']) ?>
    </div>
    <div class="col-lg-2">
        <?= $form->field($model, 'weight')->label(false)->textInput(['placeholder' => '体重']) ?>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <?=Html::submitButton('查询',['class'=>'btn btn-success'])?>
            <?= Html::a('添加会员', ['/user-info/add-user'], ['class' => 'btn btn-success']) ?>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>
