<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "people_check".
 *
 * @property integer $pc_id
 * @property integer $ui_id
 * @property string $height_blood
 * @property string $low_blood
 * @property string $blood_sugar
 * @property string $position
 * @property string $pic
 * @property string $remarks
 * @property integer $pc_type
 * @property string $doctor
 * @property string $pc_at
 * @property string $pc_create_at
 * @property string $pc_update_at
 * @property string $pc_delete_at
 * @property integer $pc_delete_flag
 */
class PeopleCheck extends \yii\db\ActiveRecord
{
    public $file;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'people_check';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ui_id', 'pc_type', 'pc_delete_flag'], 'integer'],
            [['remarks'], 'string'],
            [['height_blood', 'low_blood', 'blood_sugar',],'number'],
            [['pc_at', 'pc_id', 'ui_id','blood_sugar' ,'height_blood', 'low_blood',  'position', 'remarks', 'pc_type', 'doctor', 'pc_create_at', 'pc_update_at', 'pc_delete_at', 'file'], 'safe'],
            [[ 'position'], 'string', 'max' => 32],
            [['pic'], 'string', 'max' => 255],
            [['doctor'], 'string', 'max' => 52],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pc_id' => 'Pc ID',
            'ui_id' => 'Ui ID',
            'height_blood' => '高值',
            'low_blood' => '低值',
            'blood_sugar' => '血糖值',
            'position' => '部位',
            'pic' => 'Pic',
            'remarks' => 'Remarks',
            'pc_type' => 'Pc Type',
            'doctor' => 'Doctor',
            'pc_at' => 'Pc At',
            'pc_create_at' => 'Pc Create At',
            'pc_update_at' => 'Pc Update At',
            'pc_delete_at' => 'Pc Delete At',
            'pc_delete_flag' => 'Pc Delete Flag',
        ];
    }

    /**
     * @inheritdoc
     * @return PeopleCheckQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PeopleCheckQuery(get_called_class());
    }

    /**
     * @param $params
     * @return bool
     * User: 任亚飞
     */
    public function addPeople($params)
    {
        $this->load($params);
        if ($this->pc_id) {
            $model = self::find()->where(['pc_id' => $this->pc_id])->andWhere(['pc_delete_flag' => 1])->one();
            $model->load($params);
            $model->save();
        } else {
            return $this->save();
        }
    }
}
