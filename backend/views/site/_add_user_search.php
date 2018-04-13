<?php
use backend\assets\AppAsset;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use common\components\DateSelectHelper;
use common\components\DateHelper;
?>
<?php $form = ActiveForm::begin([
    'action' => ['go-add-user'],
    'id' => 'form_id',
    'method' => 'post',//必写
    // 'enableClientScript'=>false,
    'options' => ['enctype' => 'multipart/form-data']
]);?>
<div class="row">
    <div class="col-lg-12">
        <div class="tabs-container">
            <ul class="nav nav-tabs">
                <li id="user_msg_btn" class="active">
                    <a href="javascript:;" class="show" data-type='1'>基本信息</a>
                </li>
                <li id="check_msg_btn">
                    <a href="javascript:;" class="show" data-type='2'>问诊记录</a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="customer-info" class="tab-pane active">
                    <div class="panel-body">
                        <div class="ibox-content">

                            <div class="row" id="user_msg" style="position:relative;top:4px;">
                                <div class="row">
                                    <div class="col-sm-2" style="line-height:35px;text-align: right;width: 120px;">
                                        <?= Html::label('姓名:') ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($model, 'username')->label(false)->textInput(['placeholder' => '请输入姓名', 'class' => 'form-control']) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2" style="line-height:35px;text-align: right;width: 120px;">
                                        <?= Html::label('身份证号:') ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($model, 'id_number')->label(false)->textInput(['placeholder' => '请输入身份证号', 'class' => 'form-control']) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2" style="line-height:35px;text-align: right;width: 120px;">
                                        <?= Html::label('手机号:') ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($model, 'phone')->label(false)->textInput(['placeholder' => '请输入手机号', 'class' => 'form-control']) ?>
                                    </div>
                                </div>
<!--                                 <div class="row">
                                    <div class="col-sm-2" style="line-height:35px;text-align: right;width: 120px;">
                                        <?= Html::label('年龄:') ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($model, 'age')->label(false)->textInput(['placeholder' => '请输入年龄', 'class' => 'form-control']) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2" style="line-height:35px;text-align: right;width: 120px;">
                                        <?= Html::label('身高(cm):') ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($model, 'height')->label(false)->textInput(['placeholder' => '请输入身高', 'class' => 'form-control']) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2" style="line-height:35px;text-align: right;width: 120px;">
                                        <?= Html::label('体重(kg):') ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($model, 'weight')->label(false)->textInput(['placeholder' => '请输入体重', 'class' => 'form-control']) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2" style="line-height:35px;text-align: right;width: 120px;">
                                        <?= Html::label('地址:') ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($model, 'address')->label(false)->textInput(['placeholder' => '请输入地址', 'class' => 'form-control']) ?>
                                    </div>
                                </div> -->
                                <div class="row">
                                    <div class="col-sm-2" style="line-height:35px;text-align: right;width: 120px;">
                                        <?= Html::label('性别:') ?>
                                    </div>
                                    <div class="col-sm-4" style="line-height:35px;">
                                        <?php $model->sex=1; ?>
                                        <?= $form->field($model, 'sex')->label(false)->radioList( ['1'=>'男','2'=>'女'])?>
                                    </div>
                                </div>
<!--                                 <div class="row">
                                    <div class="col-sm-2" style="line-height:35px;text-align: right;width: 120px;">
                                        <?= Html::label('上传头像:') ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <span class="ad_file bigfile">
                                            <font>上传图片</font>
                                            <?= $form->field($model, 'ui_pic')->label(false)->fileInput(['class' => 'file','data-name'=>'ui_pic']) ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="ui_pic_img_create" style="margin-bottom:20px;">
                                    <div class="row">
                                        <div class="col-sm-2" style="line-height:35px;text-align: right;width: 120px;">
                                            <h4 class="notice" style="display: block">图片:</h4>
                                        </div>
                                        <div class="col-sm-5">
                                            <img src="" alt=""  width="110px" height="138px" style="display: none">
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                            <div class="row" id="check_msg" style="position:relative;top:4px;">
                                <div class="row">
                                    <div class="col-sm-2" style="line-height:35px;text-align: right;width: 120px;">
                                        <?= Html::label('姓名:') ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($model, 'username')->label(false)->textInput(['placeholder' => '请输入姓名', 'class' => 'form-control']) ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-2" style="line-height:35px;text-align: right;width: 120px;">
                            </div>
                            <div class="col-lg-4">
                                <?= Html::submitButton('确定', ['class' => 'btn btn-success', 'id' => 'submit_btn', 'style' => 'width:100px;', 'type' => 'submit']) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>
<?= $form->field($model, 'ui_pic_inp')->label(false)->hiddenInput(['id' => 'ui_pic_inp']) ?>

<?= $form->field($model, 'temp_file_name')->label(false)->hiddenInput(['id' => 'temp_file_name']) ?>
<?= $form->field($model, 'temp_file_url')->label(false)->hiddenInput(['id' => 'temp_file_url']) ?>
<?php ActiveForm::end(); ?>
<?php
AppAsset::addCss($this, '@web/css/ump-style.css');
AppAsset::addScript($this, '@web/js/plugins/datapicker/bootstrap-datetimepicker.js');
AppAsset::addScript($this, '@web/js/plugins/datapicker/bootstrap-datetimepicker.zh-CN.js');
AppAsset::addScript($this, '@web/js/plugins/layer/layer.js');
AppAsset::addScript($this, '@web/js/jquery-form.js');
$js = <<<JS
$(function(){
    $(".show").click(function(){
        type=$(this).attr("data-type");
        $("#user_msg_btn").removeClass("active");
        $("#check_msg_btn").removeClass("active");
        if(type==1){
            $("#user_msg_btn").addClass("active");
            $("#user_msg").css("display",'block');
            $("#check_msg").css("display",'none');
        }else{
            $("#check_msg_btn").addClass("active");
            $("#check_msg").css("display",'block');
            $("#user_msg").css("display",'none');
        }
    });            
    // $('.file').change(function() {
    //     name=$(this).attr("data-name");
    //     url=$("#"+name+"_inp").val();
    //     $("#temp_file_name").val(name);
    //     $("#temp_file_url").val(url);
    //     var form = $("#form_id");
    //     var serializeData = form.serialize();
    //     form.ajaxSubmit({
    //        type:'post',
    //        dataType: 'json', 
    //        url: '/site/up-img',
    //        data: '',        
    //        success:function(data){
    //            console.log(data);
    //            if(data){
    //                $('.'+name+'_img_create img').css('display','block');
    //                $('.'+name+'_img_create img').attr('src',data.root+data.url);
    //                $('#'+name+'_inp').val(data.url);
    //                $("font").html("重新上传");
    //            }
    //        },
    //        error:function(data){
    //            console.log('上传图片出错');
    //        }
    //     })
    // });
    // $("#userinfosearch-username").blur(function(){
    //     username_val=$("#userinfosearch-username").val();
    //     if(!username_val){
    //         $("#userinfosearch-username").parent().addClass('has-error');
    //         $("#userinfosearch-username").parent().find('.help-block').html('姓名不能为空。');
    //         return false;
    //     }else{
    //         $("#userinfosearch-username").parent().removeClass('has-error');
    //         $("#userinfosearch-username").parent().find('.help-block').html('');
    //     }
    // });
    // $("#userinfosearch-id_number").blur(function(){
    //     id_number=$("#userinfosearch-id_number").val();
    //     if(!id_number){
    //         $("#userinfosearch-id_number").parent().addClass('has-error');
    //         $("#userinfosearch-id_number").parent().find('.help-block').html('身份证号不能为空。');
    //         return false;
    //     }else{
    //         $("#userinfosearch-id_number").parent().removeClass('has-error');
    //         $("#userinfosearch-id_number").parent().find('.help-block').html('');
    //     }
    // });
    // $("#userinfosearch-phone").blur(function(){
    //     phone=$("#userinfosearch-phone").val();
    //     if(!phone){
    //         $("#userinfosearch-phone").parent().addClass('has-error');
    //         $("#userinfosearch-phone").parent().find('.help-block').html('手机号不能为空。');
    //         return false;
    //     }else{
    //         $("#userinfosearch-phone").parent().removeClass('has-error');
    //         $("#userinfosearch-phone").parent().find('.help-block').html('');
    //     }
    // });
    // $("#userinfosearch-age").blur(function(){
    //     age=$("#userinfosearch-age").val();
    //     if(!age){
    //         $("#userinfosearch-age").parent().addClass('has-error');
    //         $("#userinfosearch-age").parent().find('.help-block').html('年龄不能为空。');
    //         return false;
    //     }else{
    //         $("#userinfosearch-age").parent().removeClass('has-error');
    //         $("#userinfosearch-age").parent().find('.help-block').html('');
    //     }
    // });
    // $("#userinfosearch-height").blur(function(){
    //     height=$("#userinfosearch-height").val();
    //     if(!height){
    //         $("#userinfosearch-height").parent().addClass('has-error');
    //         $("#userinfosearch-height").parent().find('.help-block').html('身高不能为空。');
    //         return false;
    //     }else{
    //         $("#userinfosearch-height").parent().removeClass('has-error');
    //         $("#userinfosearch-height").parent().find('.help-block').html('');
    //     }
    // });
    // $("#userinfosearch-weight").blur(function(){
    //     weight=$("#userinfosearch-weight").val();
    //     if(!weight){
    //         $("#userinfosearch-weight").parent().addClass('has-error');
    //         $("#userinfosearch-weight").parent().find('.help-block').html('体重不能为空。');
    //         return false;
    //     }else{
    //         $("#userinfosearch-weight").parent().removeClass('has-error');
    //         $("#userinfosearch-weight").parent().find('.help-block').html('');
    //     }
    // });
    // $("#userinfosearch-address").blur(function(){
    //     address=$("#userinfosearch-address").val();
    //     if(!address){
    //         $("#userinfosearch-address").parent().addClass('has-error');
    //         $("#userinfosearch-address").parent().find('.help-block').html('住址不能为空。');
    //         return false;
    //     }else{
    //         $("#userinfosearch-address").parent().removeClass('has-error');
    //         $("#userinfosearch-address").parent().find('.help-block').html('');
    //     }
    // });
    // $("form").submit(function(){
    //     username_val=$("#userinfosearch-username").val();
    //     if(!username_val){
    //         $("#userinfosearch-username").parent().addClass('has-error');
    //         $("#userinfosearch-username").parent().find('.help-block').html('姓名不能为空。');
    //         return false;
    //     }else{
    //         $("#userinfosearch-username").parent().removeClass('has-error');
    //         $("#userinfosearch-username").parent().find('.help-block').html('');
    //     }
    //     id_number=$("#userinfosearch-id_number").val();
    //     if(!id_number){
    //         $("#userinfosearch-id_number").parent().addClass('has-error');
    //         $("#userinfosearch-id_number").parent().find('.help-block').html('身份证号不能为空。');
    //         return false;
    //     }else{
    //         $("#userinfosearch-id_number").parent().removeClass('has-error');
    //         $("#userinfosearch-id_number").parent().find('.help-block').html('');
    //     }
    //     phone=$("#userinfosearch-phone").val();
    //     if(!phone){
    //         $("#userinfosearch-phone").parent().addClass('has-error');
    //         $("#userinfosearch-phone").parent().find('.help-block').html('手机号不能为空。');
    //         return false;
    //     }else{
    //         $("#userinfosearch-phone").parent().removeClass('has-error');
    //         $("#userinfosearch-phone").parent().find('.help-block').html('');
    //     }
    //     age=$("#userinfosearch-age").val();
    //     if(!age){
    //         $("#userinfosearch-age").parent().addClass('has-error');
    //         $("#userinfosearch-age").parent().find('.help-block').html('年龄不能为空。');
    //         return false;
    //     }else{
    //         $("#userinfosearch-age").parent().removeClass('has-error');
    //         $("#userinfosearch-age").parent().find('.help-block').html('');
    //     }
    //     height=$("#userinfosearch-height").val();
    //     if(!height){
    //         $("#userinfosearch-height").parent().addClass('has-error');
    //         $("#userinfosearch-height").parent().find('.help-block').html('身高不能为空。');
    //         return false;
    //     }else{
    //         $("#userinfosearch-height").parent().removeClass('has-error');
    //         $("#userinfosearch-height").parent().find('.help-block').html('');
    //     }
    //     weight=$("#userinfosearch-weight").val();
    //     if(!weight){
    //         $("#userinfosearch-weight").parent().addClass('has-error');
    //         $("#userinfosearch-weight").parent().find('.help-block').html('体重不能为空。');
    //         return false;
    //     }else{
    //         $("#userinfosearch-weight").parent().removeClass('has-error');
    //         $("#userinfosearch-weight").parent().find('.help-block').html('');
    //     }
    //     address=$("#userinfosearch-address").val();
    //     if(!address){
    //         $("#userinfosearch-address").parent().addClass('has-error');
    //         $("#userinfosearch-address").parent().find('.help-block').html('住址不能为空。');
    //         return false;
    //     }else{
    //         $("#userinfosearch-address").parent().removeClass('has-error');
    //         $("#userinfosearch-address").parent().find('.help-block').html('');
    //     }
    //     var form = $("#form_id");
    //     var serializeData = form.serialize();
    //     form.ajaxSubmit({
    //        type:'post',
    //        dataType: 'json', 
    //        url: '/site/go-add-user',
    //        data: '',
    //         async: false,//ajax同步 顺序执行
    //        success:function(data){
    //             if(data.code==1){
    //                 layer.confirm('添加成功，用户编号: '+data.ui_id,{
    //                     title:'添加成功',
    //                     btn: ['确定','取消'], //按钮
    //                     btnAlign:'c', //按钮位置});
    //                 },function(){
    //                     location.replace('/site/index?UserInfoSearch%5Bui_id%5D='+data.ui_id);//自动加载页面
    //                 });
    //             }else{
    //                 layer.alert(data.msg);
    //             }
    //        },
    //        error:function(data){
    //             layer.msg('网络错误');
    //        }
    //     })
    //     return false;
    // });

});
JS;
$this->registerJs($js);
?>
