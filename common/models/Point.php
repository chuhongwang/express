<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "point".
 *
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property string $phone
 * @property string $email
 * @property string $create_time
 * @property string $update_time
 * @property string $delete_time
 * @property integer $delete_flag
 */
class Point extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'point';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'address', 'phone', 'email'], 'string', 'max' => 255],
            [['create_time', 'update_time', 'delete_time'], 'safe'],
            [['name', 'address', 'phone', 'email'],'required'],
            ['email','email'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '网点名称',
            'address' => '网点地址',
            'phone' => '电话',
            'email' => '邮箱',
        ];
    }

    /**
     * @inheritdoc
     * @return \backend\models\PointQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\PointQuery(get_called_class());
    }
}
