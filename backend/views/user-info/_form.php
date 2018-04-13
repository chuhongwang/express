<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\InquiryLog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inquiry-log-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sex')->textInput() ?>

    <?= $form->field($model, 'age')->textInput() ?>

    <?= $form->field($model, 'origin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'complaint')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'onset')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'cause')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nature')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'degree')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'add_ease')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'evolution')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'concomitant_symptoms')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'complication')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'treatment_process')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'mental_strength')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'eat_sleep')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stool')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'very_healthy')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'anaphylaxis')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'trauma_history')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'surgical_history')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'head_five_senses')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'respiratory_system')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'circulatory_system')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'digestive_system')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'urinary_system')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'blood_system')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'endocrine_metabolism')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'motion_system')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'nervous_system')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'psychosis')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'social_experience')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'working_conditions')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'habits_hobbies')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'marital_history')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'marital_status')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'spouse_situation')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'menstruation_history')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'pregnancy_history')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'family_history')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
