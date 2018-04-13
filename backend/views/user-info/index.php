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
                                    <div class="col-sm-2" style="line-height:35px;text-align: right;width: 135px;">
                                        <?= Html::label('姓名:') ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($user_model, 'username')->label(false)->textInput(['placeholder' => '请输入姓名', 'class' => 'form-control']) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2" style="line-height:35px;text-align: right;width: 135px;">
                                        <?= Html::label('身份证号:') ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($user_model, 'id_number')->label(false)->textInput(['placeholder' => '请输入身份证号', 'class' => 'form-control']) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2" style="line-height:35px;text-align: right;width: 135px;">
                                        <?= Html::label('手机号:') ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($user_model, 'phone')->label(false)->textInput(['placeholder' => '请输入手机号', 'class' => 'form-control']) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2" style="line-height:35px;text-align: right;width: 135px;">
                                        <?= Html::label('性别:') ?>
                                    </div>
                                    <div class="col-sm-4" style="line-height:35px;">
                                        <?php $user_model->sex=1; ?>
                                        <?= $form->field($user_model, 'sex')->label(false)->radioList( ['1'=>'男','2'=>'女'])?>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="check_msg" style="position:relative;top:4px;display:none;">
                                <div class="row">
                                    <div class="col-sm-2" style="line-height:35px;text-align: right;width: 135px;">
                                        <?= Html::label('年龄:') ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($log_model, 'age')->label(false)->textInput(['placeholder' => '请输入年龄', 'class' => 'form-control']) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2" style="line-height:35px;text-align: right;width: 135px;">
                                        <?= Html::label('籍贯:') ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($log_model, 'origin')->label(false)->textInput(['placeholder' => '请输入籍贯', 'class' => 'form-control']) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2" style="line-height:35px;text-align: right;width: 135px;">
                                        <?= Html::label('地址:') ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($log_model, 'address')->label(false)->textInput(['placeholder' => '请输入地址', 'class' => 'form-control']) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2" style="line-height:35px;text-align: right;width: 135px;">
                                        <?= Html::label('主诉:') ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($log_model, 'address')->label(false)->textarea(['placeholder' => '请输入主诉', 'class' => 'form-control','rows' => 3,'style'=>'resize:none;']) ?>
                                    </div>
                                </div>
                                <div class="ibox">
                                    <div class="row">
                                        <div class="col-sm-2" style="line-height:35px;text-align: right;width: 135px;">
                                            <h3>现病史</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2" style="line-height:35px;text-align: right;width: 135px;">
                                        <?= Html::label('起病情况:') ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($log_model, 'onset')->label(false)->textarea(['placeholder' => '请输入起病情况', 'class' => 'form-control','rows' => 3,'style'=>'resize:none;']) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2" style="line-height:35px;text-align: right;width: 135px;">
                                        <?= Html::label('病因和诱因:') ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($log_model, 'cause')->label(false)->textarea(['placeholder' => '请输入病因和诱因', 'class' => 'form-control','rows' => 3,'style'=>'resize:none;']) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2" style="line-height:35px;text-align: right;width: 135px;">
                                        <?= Html::label('病情发展和演变:') ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($log_model, 'evolution')->label(false)->textarea(['placeholder' => '请输入病情发展和演变', 'class' => 'form-control','rows' => 3,'style'=>'resize:none;']) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2" style="line-height:35px;text-align: right;width: 135px;">
                                        <?= Html::label('伴随症状:') ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($log_model, 'concomitant_symptoms')->label(false)->textarea(['placeholder' => '请输入伴随症状', 'class' => 'form-control','rows' => 3,'style'=>'resize:none;']) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2" style="line-height:35px;text-align: right;width: 135px;">
                                        <?= Html::label('并发症:') ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($log_model, 'complication')->label(false)->textarea(['placeholder' => '请输入并发症', 'class' => 'form-control','rows' => 3,'style'=>'resize:none;']) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2" style="line-height:35px;text-align: right;width: 135px;">
                                        <?= Html::label('诊治过程:') ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($log_model, 'treatment_process')->label(false)->textarea(['placeholder' => '请输入诊治过程', 'class' => 'form-control','rows' => 3,'style'=>'resize:none;']) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2" style="line-height:35px;text-align: right;width: 135px;">
                                        <?= Html::label('精神体力状况:') ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($log_model, 'mental_strength')->label(false)->textarea(['placeholder' => '请输入精神体力状况', 'class' => 'form-control','rows' => 3,'style'=>'resize:none;']) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2" style="line-height:35px;text-align: right;width: 135px;">
                                        <?= Html::label('饮食睡眠:') ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($log_model, 'eat_sleep')->label(false)->textarea(['placeholder' => '请输入饮食睡眠', 'class' => 'form-control','rows' => 3,'style'=>'resize:none;']) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2" style="line-height:35px;text-align: right;width: 135px;">
                                        <?= Html::label('大小便') ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($log_model, 'stool')->label(false)->textarea(['placeholder' => '请输入大小便', 'class' => 'form-control','rows' => 3,'style'=>'resize:none;']) ?>
                                    </div>
                                </div>
                                <div class="ibox">
                                    <div class="row">
                                        <div class="col-sm-2" style="line-height:35px;text-align: right;width: 135px;">
                                            <h3>主要症状</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2" style="line-height:35px;text-align: right;width: 135px;">
                                        <?= Html::label('部位:') ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($log_model, 'position')->label(false)->textInput(['placeholder' => '请输入部位', 'class' => 'form-control']) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2" style="line-height:35px;text-align: right;width: 135px;">
                                        <?= Html::label('性质:') ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($log_model, 'nature')->label(false)->textInput(['placeholder' => '请输入性质', 'class' => 'form-control']) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2" style="line-height:35px;text-align: right;width: 135px;">
                                        <?= Html::label('程度:') ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($log_model, 'degree')->label(false)->textInput(['placeholder' => '请输入程度', 'class' => 'form-control']) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2" style="line-height:35px;text-align: right;width: 135px;">
                                        <?= Html::label('持续时间:') ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($log_model, 'duration')->label(false)->textInput(['placeholder' => '请输入持续时间', 'class' => 'form-control']) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2" style="line-height:35px;text-align: right;width: 135px;">
                                        <?= Html::label('加重和缓解因素:') ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($log_model, 'add_ease')->label(false)->textInput(['placeholder' => '请输入加重和缓解因素', 'class' => 'form-control']) ?>
                                    </div>
                                </div>
                                <div class="ibox">
                                    <div class="row">
                                        <div class="col-sm-2" style="line-height:35px;text-align: right;width: 135px;">
                                            <h3>既往史</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2" style="line-height:35px;text-align: right;width: 135px;">
                                        <?= Html::label('平素健康状况:') ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($log_model, 'very_healthy')->label(false)->textarea(['placeholder' => '请输入平素健康状况', 'class' => 'form-control','rows' => 3,'style'=>'resize:none;']) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2" style="line-height:35px;text-align: right;width: 135px;">
                                        <?= Html::label('过敏史:') ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($log_model, 'anaphylaxis')->label(false)->textarea(['placeholder' => '请输入过敏史', 'class' => 'form-control','rows' => 3,'style'=>'resize:none;']) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2" style="line-height:35px;text-align: right;width: 135px;">
                                        <?= Html::label('外伤史:') ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($log_model, 'trauma_history')->label(false)->textarea(['placeholder' => '请输入外伤史', 'class' => 'form-control','rows' => 3,'style'=>'resize:none;']) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2" style="line-height:35px;text-align: right;width: 135px;">
                                        <?= Html::label('手术史:') ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($log_model, 'surgical_history')->label(false)->textarea(['placeholder' => '请输入手术史', 'class' => 'form-control','rows' => 3,'style'=>'resize:none;']) ?>
                                    </div>
                                </div>
                                <div class="ibox">
                                    <div class="row">
                                        <div class="col-sm-2" style="line-height:35px;text-align: right;width: 135px;">
                                            <h3>系统回顾</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2" style="line-height:35px;text-align: right;width: 135px;">
                                        <?= Html::label('头颅五官:') ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($log_model, 'head_five_senses')->label(false)->textarea(['placeholder' => '请输入头颅五官', 'class' => 'form-control','rows' => 3,'style'=>'resize:none;']) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2" style="line-height:35px;text-align: right;width: 135px;">
                                        <?= Html::label('呼吸系统:') ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($log_model, 'respiratory_system')->label(false)->textarea(['placeholder' => '请输入呼吸系统', 'class' => 'form-control','rows' => 3,'style'=>'resize:none;']) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2" style="line-height:35px;text-align: right;width: 135px;">
                                        <?= Html::label('循环系统:') ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($log_model, 'circulatory_system')->label(false)->textarea(['placeholder' => '请输入循环系统', 'class' => 'form-control','rows' => 3,'style'=>'resize:none;']) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2" style="line-height:35px;text-align: right;width: 135px;">
                                        <?= Html::label('消化系统:') ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($log_model, 'digestive_system')->label(false)->textarea(['placeholder' => '请输入消化系统', 'class' => 'form-control','rows' => 3,'style'=>'resize:none;']) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2" style="line-height:35px;text-align: right;width: 135px;">
                                        <?= Html::label('泌尿系统:') ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($log_model, 'urinary_system')->label(false)->textarea(['placeholder' => '请输入泌尿系统', 'class' => 'form-control','rows' => 3,'style'=>'resize:none;']) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2" style="line-height:35px;text-align: right;width: 135px;">
                                        <?= Html::label('血液系统:') ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($log_model, 'blood_system')->label(false)->textarea(['placeholder' => '请输入血液系统', 'class' => 'form-control','rows' => 3,'style'=>'resize:none;']) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2" style="line-height:35px;text-align: right;width: 135px;">
                                        <?= Html::label('内分泌系统及代谢') ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($log_model, 'endocrine_metabolism')->label(false)->textarea(['placeholder' => '请输入内分泌系统及代谢', 'class' => 'form-control','rows' => 3,'style'=>'resize:none;']) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2" style="line-height:35px;text-align: right;width: 135px;">
                                        <?= Html::label('运动系统:') ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($log_model, 'motion_system')->label(false)->textarea(['placeholder' => '请输入运动系统', 'class' => 'form-control','rows' => 3,'style'=>'resize:none;']) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2" style="line-height:35px;text-align: right;width: 135px;">
                                        <?= Html::label('神经系统:') ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($log_model, 'nervous_system')->label(false)->textarea(['placeholder' => '请输入神经系统', 'class' => 'form-control','rows' => 3,'style'=>'resize:none;']) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2" style="line-height:35px;text-align: right;width: 135px;">
                                        <?= Html::label('精神异常:') ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($log_model, 'psychosis')->label(false)->textarea(['placeholder' => '请输入精神异常', 'class' => 'form-control','rows' => 3,'style'=>'resize:none;']) ?>
                                    </div>
                                </div>
                                <div class="ibox">
                                    <div class="row">
                                        <div class="col-sm-2" style="line-height:35px;text-align: right;width: 135px;">
                                            <h3>个人史</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2" style="line-height:35px;text-align: right;width: 135px;">
                                        <?= Html::label('社会经历:') ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($log_model, 'social_experience')->label(false)->textarea(['placeholder' => '请输入社会经历', 'class' => 'form-control','rows' => 3,'style'=>'resize:none;']) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2" style="line-height:35px;text-align: right;width: 135px;">
                                        <?= Html::label('职业和工作条件:') ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($log_model, 'working_conditions')->label(false)->textarea(['placeholder' => '请输入职业和工作条件', 'class' => 'form-control','rows' => 3,'style'=>'resize:none;']) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2" style="line-height:35px;text-align: right;width: 135px;">
                                        <?= Html::label('习惯和嗜好:') ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($log_model, 'habits_hobbies')->label(false)->textarea(['placeholder' => '请输入习惯和嗜好', 'class' => 'form-control','rows' => 3,'style'=>'resize:none;']) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2" style="line-height:35px;text-align: right;width: 135px;">
                                        <?= Html::label('冶游史:') ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($log_model, 'marital_history')->label(false)->textarea(['placeholder' => '请输入冶游史', 'class' => 'form-control','rows' => 3,'style'=>'resize:none;']) ?>
                                    </div>
                                </div>
                                <div class="ibox">
                                    <div class="row">
                                        <div class="col-sm-2" style="line-height:35px;text-align: right;width: 135px;">
                                            <h3>婚姻史</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2" style="line-height:35px;text-align: right;width: 135px;">
                                        <?= Html::label('婚姻情况:') ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($log_model, 'marital_status')->label(false)->textarea(['placeholder' => '请输入婚姻情况', 'class' => 'form-control','rows' => 3,'style'=>'resize:none;']) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2" style="line-height:35px;text-align: right;width: 135px;">
                                        <?= Html::label('配偶情况:') ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($log_model, 'spouse_situation')->label(false)->textarea(['placeholder' => '请输入配偶情况', 'class' => 'form-control','rows' => 3,'style'=>'resize:none;']) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2" style="line-height:35px;text-align: right;width: 135px;">
                                        <?= Html::label('月经史:') ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($log_model, 'menstruation_history')->label(false)->textarea(['placeholder' => '请输入月经史', 'class' => 'form-control','rows' => 3,'style'=>'resize:none;']) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2" style="line-height:35px;text-align: right;width: 135px;">
                                        <?= Html::label('孕产史:') ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($log_model, 'pregnancy_history')->label(false)->textarea(['placeholder' => '请输入孕产史', 'class' => 'form-control','rows' => 3,'style'=>'resize:none;']) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2" style="line-height:35px;text-align: right;width: 135px;">
                                        <?= Html::label('家族史:') ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($log_model, 'family_history')->label(false)->textarea(['placeholder' => '请输入家族史', 'class' => 'form-control','rows' => 3,'style'=>'resize:none;']) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2" style="line-height:35px;text-align: right;width: 135px;">
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
<!-- 区分微信与后台录入 -->
<input type="hidden" name="type" value="1">
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
});
JS;
$this->registerJs($js);
?>
