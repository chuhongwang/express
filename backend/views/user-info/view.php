<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\InquiryLog */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Inquiry Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inquiry-log-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'sex',
            'age',
            'origin',
            'address',
            'user_id',
            'complaint:ntext',
            'onset:ntext',
            'cause:ntext',
            'position',
            'nature',
            'degree',
            'add_ease',
            'evolution:ntext',
            'concomitant_symptoms:ntext',
            'complication:ntext',
            'treatment_process:ntext',
            'mental_strength:ntext',
            'eat_sleep',
            'stool',
            'very_healthy:ntext',
            'anaphylaxis:ntext',
            'trauma_history:ntext',
            'surgical_history:ntext',
            'head_five_senses:ntext',
            'respiratory_system:ntext',
            'circulatory_system:ntext',
            'digestive_system:ntext',
            'urinary_system:ntext',
            'blood_system:ntext',
            'endocrine_metabolism:ntext',
            'motion_system:ntext',
            'nervous_system:ntext',
            'psychosis:ntext',
            'social_experience:ntext',
            'working_conditions:ntext',
            'habits_hobbies:ntext',
            'marital_history:ntext',
            'marital_status:ntext',
            'spouse_situation:ntext',
            'menstruation_history:ntext',
            'pregnancy_history:ntext',
            'family_history:ntext',
        ],
    ]) ?>

</div>
