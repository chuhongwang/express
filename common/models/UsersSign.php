<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ac_users_sign".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $date
 * @property integer $signin_day
 * @property integer $created_at
 * @property string $note
 */
class UsersSign extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ac_users_sign';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('ylb_activity');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'signin_day', 'created_at'], 'integer'],
            [['date'], 'required'],
            [['date'], 'string', 'max' => 255],
            [['note'], 'string', 'max' => 256]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'date' => 'Date',
            'signin_day' => 'Signin Day',
            'created_at' => 'Created At',
            'note' => 'Note',
        ];
    }

    /**
     * @inheritdoc
     * @return \backend\models\UsersSignQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\UsersSignQuery(get_called_class());
    }

    public function getIntegralLog()
    {
        //同样第一个参数指定关联的子表模型类名
        return $this->hasOne(UsersIntegralChangeLog::className(), ['extend_id' => 'id'])->where(['extend_table' => self::tableName()]);
    }
}
