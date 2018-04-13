<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "inquiry_log".
 *
 * @property string $id
 * @property string $username
 * @property integer $sex
 * @property integer $age
 * @property string $origin
 * @property string $address
 * @property string $user_id
 * @property string $complaint
 * @property string $onset
 * @property string $cause
 * @property string $position
 * @property string $nature
 * @property string $degree
 * @property string $add_ease
 * @property string $evolution
 * @property string $concomitant_symptoms
 * @property string $complication
 * @property string $treatment_process
 * @property string $mental_strength
 * @property string $eat_sleep
 * @property string $stool
 * @property string $very_healthy
 * @property string $anaphylaxis
 * @property string $trauma_history
 * @property string $surgical_history
 * @property string $head_five_senses
 * @property string $respiratory_system
 * @property string $circulatory_system
 * @property string $digestive_system
 * @property string $urinary_system
 * @property string $blood_system
 * @property string $endocrine_metabolism
 * @property string $motion_system
 * @property string $nervous_system
 * @property string $psychosis
 * @property string $social_experience
 * @property string $working_conditions
 * @property string $habits_hobbies
 * @property string $marital_history
 * @property string $marital_status
 * @property string $spouse_situation
 * @property string $menstruation_history
 * @property string $pregnancy_history
 * @property string $family_history
 */
class InquiryLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inquiry_log';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sex', 'age', 'user_id'], 'integer'],
            [['complaint', 'onset', 'cause', 'evolution', 'concomitant_symptoms', 'complication', 'treatment_process', 'mental_strength', 'very_healthy', 'anaphylaxis', 'trauma_history', 'surgical_history', 'head_five_senses', 'respiratory_system', 'circulatory_system', 'digestive_system', 'urinary_system', 'blood_system', 'endocrine_metabolism', 'motion_system', 'nervous_system', 'psychosis', 'social_experience', 'working_conditions', 'habits_hobbies', 'marital_history', 'marital_status', 'spouse_situation', 'menstruation_history', 'pregnancy_history', 'family_history'], 'string'],
            [['username'], 'string', 'max' => 20],
            [['origin', 'address', 'position', 'nature', 'degree', 'add_ease', 'eat_sleep', 'stool'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'sex' => 'Sex',
            'age' => '年龄',
            'origin' => '籍贯',
            'address' => '地址',
            'user_id' => 'User ID',
            'complaint' => 'Complaint',
            'onset' => 'Onset',
            'cause' => 'Cause',
            'position' => 'Position',
            'nature' => 'Nature',
            'degree' => 'Degree',
            'add_ease' => 'Add Ease',
            'evolution' => 'Evolution',
            'concomitant_symptoms' => 'Concomitant Symptoms',
            'complication' => 'Complication',
            'treatment_process' => 'Treatment Process',
            'mental_strength' => 'Mental Strength',
            'eat_sleep' => 'Eat Sleep',
            'stool' => 'Stool',
            'very_healthy' => 'Very Healthy',
            'anaphylaxis' => 'Anaphylaxis',
            'trauma_history' => 'Trauma History',
            'surgical_history' => 'Surgical History',
            'head_five_senses' => 'Head Five Senses',
            'respiratory_system' => 'Respiratory System',
            'circulatory_system' => 'Circulatory System',
            'digestive_system' => 'Digestive System',
            'urinary_system' => 'Urinary System',
            'blood_system' => 'Blood System',
            'endocrine_metabolism' => 'Endocrine Metabolism',
            'motion_system' => 'Motion System',
            'nervous_system' => 'Nervous System',
            'psychosis' => 'Psychosis',
            'social_experience' => 'Social Experience',
            'working_conditions' => 'Working Conditions',
            'habits_hobbies' => 'Habits Hobbies',
            'marital_history' => 'Marital History',
            'marital_status' => 'Marital Status',
            'spouse_situation' => 'Spouse Situation',
            'menstruation_history' => 'Menstruation History',
            'pregnancy_history' => 'Pregnancy History',
            'family_history' => 'Family History',
        ];
    }

    /**
     * @inheritdoc
     * @return \backend\models\InquiryLogQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\InquiryLogQuery(get_called_class());
    }
}
