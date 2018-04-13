<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "history_record".
 *
 * @property string $id
 * @property integer $state
 * @property string $date
 * @property string $express_id
 * @property string $point
 * @property string $create_time
 * @property string $update_time
 * @property string $delete_time
 * @property integer $delete_flag
 */
class HistoryRecord extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'history_record';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'state', 'express_id', 'point'], 'integer'],
            [['date','create_time', 'update_time', 'delete_time'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'state' => '状态',
            'date' => '状态改变时间',
            'express_id' => '快件id',
            'point' => '网点id',
        ];
    }

    /**
     * @inheritdoc
     * @return \backend\models\HistoryRecordQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\HistoryRecordQuery(get_called_class());
    }
}
