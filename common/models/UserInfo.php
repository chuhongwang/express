<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_info".
 *
 * @property integer $ui_id
 * @property string $username
 * @property string $id_number
 * @property integer $phone
 * @property integer $age
 * @property integer $sex
 * @property integer $height
 * @property double $weight
 * @property string $create_at
 * @property string $update_at
 * @property string $delete_at
 * @property integer $delete_flag
 * @property string $ui_pic
 * @property string $address
 */
class UserInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ui_id'], 'required'],
            [['ui_id', 'phone', 'age', 'sex', 'height', 'delete_flag'], 'integer'],
            [['create_at', 'update_at', 'delete_at', 'address', 'ui_pic'], 'safe'],
            [['username', 'id_number'], 'string', 'max' => 20],
            [['ui_id','username','id_number','phone','age','height','weight'],'filter','filter'=>'trim'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ui_id' => '编号',
            'username' => '姓名',
            'id_number' => '身份证号',
            'phone' => '手机号',
            'age' => '年龄',
            'sex' => '性别',
            'height' => '身高',
            'weight' => '体重',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
            'delete_at' => 'Delete At',
            'delete_flag' => 'Delete Flag',
            'address' => '地址',
            'ui_pic' => '头像',
        ];
    }

    /**
     * @inheritdoc
     * @return UserInfoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserInfoQuery(get_called_class());
    }

    /**
     * 配置关联关系
     */
    public function getPeopleCheck()
    {
        return $this->hasMany(PeopleCheck::className(), ['ui_id' => 'ui_id'])->andWhere(['pc_delete_flag' => 1])->orderBy('pc_at');
    }
}
