<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "express".
 *
 * @property string $id
 * @property string $express_number
 * @property integer $state
 * @property string $post_address
 * @property string $receive_address
 * @property string $post_name
 * @property string $receive_name
 * @property double $price
 * @property string $post_phone
 * @property string $receive_phone
 * @property integer $point_id
 * @property integer $next_point_id
 * @property string $create_time
 * @property string $update_time
 * @property string $delete_time
 * @property integer $delete_flag
 */
class Express extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'express';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['state', 'point_id', 'next_point_id', 'delete_flag'], 'integer'],
            [['price'], 'number'],
            [['create_time', 'update_time', 'delete_time'], 'safe'],
            [['express_number', 'post_address', 'receive_address', 'post_name', 'receive_name', 'post_phone', 'receive_phone'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'express_number' => '快递单号',
            'state' => '状态',
            'post_address' => '寄件人地址',
            'receive_address' => '收件人地址',
            'post_name' => '寄件人',
            'receive_name' => '收件人',
            'price' => '运费',
            'post_phone' => '收件人电话',
            'receive_phone' => '收件人电话',
            'point_id' => '所在网点',
            'next_point_id' => '下一个网点',
            'create_time' => '创建时间',
            'update_time' => '修改时间',
            'delete_time' => '删除时间',
            'delete_flag' => '删除标识：1未删除，2已删除',
        ];
    }

    /**
     * @inheritdoc
     * @return \backend\models\ExpressQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\ExpressQuery(get_called_class());
    }
}
