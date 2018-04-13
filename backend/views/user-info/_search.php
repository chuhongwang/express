<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\InquiryLogSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inquiry-log-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'sex') ?>

    <?= $form->field($model, 'age') ?>

    <?= $form->field($model, 'origin') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'complaint') ?>

    <?php // echo $form->field($model, 'onset') ?>

    <?php // echo $form->field($model, 'cause') ?>

    <?php // echo $form->field($model, 'position') ?>

    <?php // echo $form->field($model, 'nature') ?>

    <?php // echo $form->field($model, 'degree') ?>

    <?php // echo $form->field($model, 'add_ease') ?>

    <?php // echo $form->field($model, 'evolution') ?>

    <?php // echo $form->field($model, 'concomitant_symptoms') ?>

    <?php // echo $form->field($model, 'complication') ?>

    <?php // echo $form->field($model, 'treatment_process') ?>

    <?php // echo $form->field($model, 'mental_strength') ?>

    <?php // echo $form->field($model, 'eat_sleep') ?>

    <?php // echo $form->field($model, 'stool') ?>

    <?php // echo $form->field($model, 'very_healthy') ?>

    <?php // echo $form->field($model, 'anaphylaxis') ?>

    <?php // echo $form->field($model, 'trauma_history') ?>

    <?php // echo $form->field($model, 'surgical_history') ?>

    <?php // echo $form->field($model, 'head_five_senses') ?>

    <?php // echo $form->field($model, 'respiratory_system') ?>

    <?php // echo $form->field($model, 'circulatory_system') ?>

    <?php // echo $form->field($model, 'digestive_system') ?>

    <?php // echo $form->field($model, 'urinary_system') ?>

    <?php // echo $form->field($model, 'blood_system') ?>

    <?php // echo $form->field($model, 'endocrine_metabolism') ?>

    <?php // echo $form->field($model, 'motion_system') ?>

    <?php // echo $form->field($model, 'nervous_system') ?>

    <?php // echo $form->field($model, 'psychosis') ?>

    <?php // echo $form->field($model, 'social_experience') ?>

    <?php // echo $form->field($model, 'working_conditions') ?>

    <?php // echo $form->field($model, 'habits_hobbies') ?>

    <?php // echo $form->field($model, 'marital_history') ?>

    <?php // echo $form->field($model, 'marital_status') ?>

    <?php // echo $form->field($model, 'spouse_situation') ?>

    <?php // echo $form->field($model, 'menstruation_history') ?>

    <?php // echo $form->field($model, 'pregnancy_history') ?>

    <?php // echo $form->field($model, 'family_history') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
