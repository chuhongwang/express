<?php
/**
 * Created by PhpStorm.
 * User: nicc
 * Date: 2018/3/7
 * Time: 16:59
 * Auth: QQ:1358971278
 */

namespace backend\models;

use common\components\DateHelper;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\debug\models\timeline\DataProvider;
use \common\models\UserInfo;

class UserInfoSearch extends UserInfo
{
    public $type = 1;

    public $height_blood;
    public $low_blood;
    public $position;

    public $blood_sugar;
    public $blood_img;
    public $b_chao;
    public $body_fluid;
    public $x_guang;

    public $pc_at_1;
    public $pc_at_2;
    public $pc_at_3;
    public $pc_at_4;
    public $pc_at_5;
    public $pc_at_6;

    public $remarks1;
    public $remarks2;
    public $remarks3;
    public $remarks4;
    public $remarks5;
    public $remarks6;

    public $ui_pic_inp;
    public $body_fluid_inp;
    public $b_chao_inp;
    public $blood_img_inp;
    public $x_guang_inp;

    public $temp_file_name;
    public $temp_file_url;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ui_id', 'username', 'id_number', 'phone'], 'required'],
            [['ui_id', 'delete_flag'], 'integer'],
            [['create_at', 'phone', 'age', 'sex', 'height', 'update_at', 'delete_at', 'type', 'height_blood', 'low_blood', 'blood_sugar', 'position', 'remarks', 'pic', 'pc_type', 'weight', 'pc_at'], 'safe'],
            [['username', 'id_number'], 'string', 'max' => 20],
            [['ui_id', 'username', 'id_number', 'phone', 'age', 'height', 'weight'], 'filter', 'filter' => 'trim'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * @param $params
     * @return ActiveDataProvider
     * User: 任亚飞
     */
    public function search($params)
    {
        $this->load($params);
        $data = UserInfo::find()->where(['ui_id' => $this->ui_id, 'delete_flag' => 1])->with('peopleCheck')->one();
        return $data;
    }
    public function addUser($params)
    {
        $this->load($params);

        $ui_id        = self::find()->getMaxUserId($this->sex);
        $this->ui_id  = $ui_id;
        $this->ui_pic = empty($params['UserInfoSearch']['ui_pic_inp']) ? '' : '/' . $params['UserInfoSearch']['ui_pic_inp'];
        $this->save();

        if (!empty($this->getErrors())) {
            $result['code'] = 0;
            $result['msg']  = '请检查是否输入正确';
            return $result;
        }

        $result['code']  = 1;
        $result['ui_id'] = $ui_id;

        return $result;
    }

    /**
     *class:${name}
     *user:褚红旺
     * @param $params
     * @return ActiveDataProvider
     * 获取用户信息列表
     */
    public function getUserList($params)
    {
        $this->load($params);
        if ($this->sex == 0) {
            $this->sex = "";
        }
        $query = UserInfo::find()->andFilterWhere(['ui_id' => trim($this->ui_id)])
            ->andFilterWhere(['like', 'username', trim($this->username)])
            ->andFilterWhere(['id_number' => trim($this->id_number)])
            ->andFilterWhere(['phone' => trim($this->phone)])
            ->andFilterWhere(['age' => trim($this->age)])
            ->andFilterWhere(['sex' => trim($this->sex)])
            ->andFilterWhere(['height' => trim($this->height)])
            ->andFilterWhere(['weight' => trim($this->weight)])
            ->andFilterWhere(['delete_flag' => 1]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        return $dataProvider;
    }

    /**
     *class:${name}
     *user:褚红旺
     * @param $ui_id
     * 会员信息回显
     */
    public function UpdateUser($ui_id)
    {
        $model           = UserInfo::find()->andFilterWhere(['ui_id' => $ui_id])->asArray()->one();
        $this->ui_id     = $model['ui_id'];
        $this->username  = $model['username'];
        $this->id_number = $model['id_number'];
        $this->phone     = $model['phone'];
        $this->sex       = $model['sex'];
        $this->age       = $model['age'];
        $this->height    = $model['height'];
        $this->weight    = $model['weight'];
        $this->ui_pic    = $model['ui_pic'];
        $this->address   = $model['address'];
    }

    /**
     *class:${name}
     *user:褚红旺
     * @param $params
     * 修改信息
     */
    public function UpdateInfo($params)
    {
        $user = UserInfo::find()->andFilterWhere(['ui_id' => $params['UserInfoSearch']['ui_id']])->one();
        $this->load($params);
        $user->id_number = $this->id_number;
        $user->phone     = $this->phone;
        $user->age       = $this->age;
        $user->sex       = $this->sex;
        $user->weight    = $this->weight;
        $user->height    = $this->height;
        $user->address   = $this->address;
        if ($this->ui_pic_inp[0] != "/") {
            $this->ui_pic_inp = "/" . $this->ui_pic_inp;
        }
        $user->ui_pic    = $this->ui_pic_inp;
        $user->update_at = DateHelper::getDateTime();
        $user->save();
    }
}
