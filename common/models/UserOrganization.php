<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_organization".
 *
 * @property integer $id
 * @property integer $platform
 * @property integer $uid
 * @property string $phone
 * @property string $realname
 * @property string $idnum
 * @property string $regip
 * @property integer $type
 * @property string $created_at
 * @property string $updated_at
 */
class UserOrganization extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        preg_match("/dbname=([^;]+)/i", static::getDb()->dsn, $matches);
        return $matches[1] . '.user_organization';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('ylb_user');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['platform'], 'required'],
            [['platform', 'uid', 'type'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['phone'], 'string', 'max' => 20],
            [['realname'], 'string', 'max' => 100],
            [['idnum'], 'string', 'max' => 50],
            [['regip'], 'string', 'max' => 16],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'platform' => 'Platform',
            'uid' => 'Uid',
            'phone' => 'Phone',
            'realname' => 'Realname',
            'idnum' => 'Idnum',
            'regip' => 'Regip',
            'type' => 'Type',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @inheritdoc
     * @return \backend\models\UserOrganizationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\UserOrganizationQuery(get_called_class());
    }
}
