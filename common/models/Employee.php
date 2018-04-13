<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property integer $id
 * @property string $name
 * @property integer $gender
 * @property string $phone
 * @property string $email
 * @property string $birthday
 * @property string $address
 * @property integer $pointId
 * @property string $create_time
 * @property string $update_time
 * @property string $delete_time
 * @property integer $delete_flag
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employee';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gender', 'pointId'], 'integer'],
            [['create_time', 'update_time', 'delete_time','birthday'], 'safe'],
            [['name', 'phone', 'email', 'address'], 'string', 'max' => 255],
            [['name','gender','phone','email','birthday','address','pointId'],'required'],
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
            'name' => '用户姓名',
            'gender' => '性别：1男；2女',
            'phone' => '电话',
            'email' => '邮箱',
            'birthday' => '生日',
            'address' => '现居地址',
            'pointId' => '所在网点id',
        ];
    }

    /**
     * @inheritdoc
     * @return \backend\models\EmployeeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\EmployeeQuery(get_called_class());
    }

    public function getPoint(){
        return $this->hasOne(Point::className(),['id'=>'pointId']);
    }
}
