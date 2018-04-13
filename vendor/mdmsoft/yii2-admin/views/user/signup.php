<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\models\ultron\UmpDict;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \mdm\admin\models\form\Signup */

$this->title = Yii::t('rbac-admin', 'Signup');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>
    <?= Html::errorSummary($model)?>
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                <?= $form->field($model, 'username') ?>
                <?= $form->field($model, 'email') ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <?php $model->platform=1; ?>

                <div class="form-group">
                    <?= Html::submitButton(Yii::t('rbac-admin', 'Signup'), ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<?php
$js = <<<JS
/**
 * Simplified Chinese translation for bootstrap-datetimepicker
 * Yuan Cheung <advanimal@gmail.com>
 */

$(function() {
    $("#signup-one_de").blur(function(){
        one_val=$("#signup-one_de").val();
        if(one_val==''){
            $("#signup-one_de").parent().parent().find('.help-block').css('color','#a94442');
            $("#signup-one_de").parent().parent().find('.help-block').html('名称不能为空');
            $("#signup-one_de").css('border-color','#ed5565');
        }else{
            $("#signup-one_de").parent().parent().find('.help-block').css('color','');
            $("#signup-one_de").parent().parent().find('.help-block').html('');
            $("#signup-one_de").css('border-color','#e5e6e7');
        }
    });
    $("#form-signup").submit(function(){
        one_val=$("#signup-one_de").val();
        if(one_val==''){
            $("#signup-one_de").parent().parent().find('.help-block').css('color','#a94442');
            $("#signup-one_de").parent().parent().find('.help-block').html('名称不能为空');
            $("#signup-one_de").css('border-color','#ed5565');
            return false;
        }else{
            $("#signup-one_de").parent().parent().find('.help-block').css('color','');
            $("#signup-one_de").parent().parent().find('.help-block').html('');
            $("#signup-one_de").css('border-color','#e5e6e7');
            return true;
        }
    });
})
JS;
$this->registerJs($js);
?>