<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = '安全设置';
?>
<style>
#safe_man{
    margin-top: 60px;
}
#safe_man label{
    font-weight: normal;
    font-size: 14px;
}
</style>
<?php $form = ActiveForm::begin([
    'action'  => 'go-upd',
    'id'      => 'safe_upd_pwd',
    'method'  => 'get', //必写
    'options' => ['enctype' => 'multipart/form-data'],

]);?>

<div class="ibox-content" id="safe_man">
    <div class="row" style="position:relative;top:4px;">
        <div class="row">
            <div class="col-md-3" style="line-height:50px;text-align: right;width: 150px;">
              <?=Html::label('原登录密码:')?>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <input type="password" id="user-pwd" class="form-control" placeholder="原登录密码" name="user[pwd]">
                    <div class="help-block"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3" style="line-height:50px;text-align: right;width: 150px;">
              <?=Html::label('新登录密码:')?>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <input type="password" id="user-rpwd" class="form-control" placeholder="新登录密码" name="user[rpwd]">
                    <div class="help-block"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3" style="line-height:50px;text-align: right;width: 150px;">
              <?=Html::label('再次输入密码:')?>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <input type="password" id="user-rrpwd" class="form-control" placeholder="再次输入密码" name="user[rpwd]">
                    <div class="help-block"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2" style="line-height:35px;text-align: right;">
            </div>
            <div class="col-lg-4">
                <?=Html::submitButton('提交', ['class' => 'btn btn-default', 'id' => 'submit_btn', 'style' => 'width:100px;', 'type' => 'submit'])?>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end();?>
<script src="https://cdn.bootcss.com/jquery/2.2.2/jquery.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<?php
$session   = Yii::$app->session;
$safe_type = $session['safe_type'];
unset($session['safe_type']);
if (empty($safe_type)) {
    $safe_type = 'no';
}
?>
<?php
$js = <<<JS
if('$safe_type'=='true'){
    alert('修改成功');
}else if('$safe_type'=='false'){
    alert('修改失败,请检查');
}
pwd_type=false;
rpwd_type=false;
rrpwd_type=false;
$("#user-pwd").blur(function(){
    val=$(this).val();
    if(!val){
        $(this).parent().find('.help-block').html('原登录密码不可为空');
        $(this).parent().find('.help-block').css('color','red');
        return pwd_type=false;
    }else{
        $(this).parent().find('.help-block').html('');
        $(this).parent().find('.help-block').css('color','');
        return pwd_type=true;
    }
});
$("#user-rpwd").blur(function(){
    val=$(this).val();
    if(!val){
        $(this).parent().find('.help-block').html('新登录不可为空');
        $(this).parent().find('.help-block').css('color','red');
        return rpwd_type=false;
    }else{
        $(this).parent().find('.help-block').html('');
        $(this).parent().find('.help-block').css('color','');
        return rpwd_type=true;
    }
});
$("#user-rrpwd").blur(function(){
    val=$(this).val();
    r_val=$("#user-rpwd").val();
    if(!val){
        $(this).parent().find('.help-block').html('确认密码不可为空');
        $(this).parent().find('.help-block').css('color','red');
        return rrpwd_type=false;
    }
    if(val!=r_val){
        $(this).parent().find('.help-block').html('两次输入密码不同');
        $(this).parent().find('.help-block').css('color','red');
        return rrpwd_type=false;
    }else{
        $(this).parent().find('.help-block').html('');
        $(this).parent().find('.help-block').css('color','');
        return rrpwd_type=true;
    }
});
$("#safe_upd_pwd").submit(function(){
    $("#user-pwd").blur();
    $("#user-rpwd").blur();
    $("#user-rrpwd").blur();
    if(pwd_type&&rpwd_type&&rrpwd_type){
        return true;
    }
    return false;
});
JS;
$this->registerJs($js);
?>