<?php

namespace backend\models;

use common\components\DateHelper;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Express;

/**
 * ExpressSearch represents the model behind the search form about `common\models\Express`.
 */
class ExpressSearch extends Express
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'state', 'point_id', 'next_point_id', 'delete_flag'], 'integer'],
            [['express_number', 'post_address', 'receive_address', 'post_name', 'receive_name', 'post_phone', 'receive_phone', 'create_time', 'update_time', 'delete_time'], 'safe'],
            [['price'], 'number'],
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
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Express::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'state' => $this->state,
            'price' => $this->price,
            'point_id' => $this->point_id,
            'next_point_id' => $this->next_point_id,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
            'delete_time' => $this->delete_time,
            'delete_flag' => 1,
        ]);

        $query->andFilterWhere(['like', 'express_number', $this->express_number])
            ->andFilterWhere(['like', 'post_address', $this->post_address])
            ->andFilterWhere(['like', 'receive_address', $this->receive_address])
            ->andFilterWhere(['like', 'post_name', $this->post_name])
            ->andFilterWhere(['like', 'receive_name', $this->receive_name])
            ->andFilterWhere(['like', 'post_phone', $this->post_phone])
            ->andFilterWhere(['like', 'receive_phone', $this->receive_phone]);

        return $dataProvider;
    }

    public function getData($params)
    {
        $id = $params['ExpressSearch']['id'];
        $model = Express::find()->andFilterWhere(['id' => $id])->andFilterWhere(['delete_flag' => 1])->asArray()->one();
        if (empty($model)) {
            return false;
        } else {
            $this->id = $model['id'];
            $this->express_number = $model['express_number'];
            $this->state = $model['state'];
            $this->post_address = $model['post_address'];
            $this->receive_address = $model['receive_address'];
            $this->post_name = $model['post_name'];
            $this->receive_name = $model['receive_name'];
            $this->price = $model['price'];
            $this->post_phone = $model['post_phone'];
            $this->receive_phone = $model['receive_phone'];
            $this->point_id = $model['point_id'];
            $this->next_point_id = $model['next_point_id'];
            return true;
        }
    }

    public function EditExpress($params){
        $this->load($params);
        if(!empty($this->id)){
            $model=Express::find()->andFilterWhere(['id'=>$this->id])->andFilterWhere(['delete_flag'=>1])->one();
            $model->post_address=$this->post_address;
            $model->receive_address=$this->receive_address;
            $model->post_name=$this->post_name;
            $model->receive_name=$this->receive_name;
            $model->post_phone=$this->post_phone;
            $model->receive_phone=$this->receive_phone;
            $model->point_id=$this->point_id;
            $model->next_point_id=$this->next_point_id;
            $model->update_time=DateHelper::getDateTime();
            $res=$model->save();
            return $res;
        }
    }

    public function getDelete($id, $delete_flag)
    {
        return Express::updateAll(['delete_flag' => $delete_flag, 'delete_time' => DateHelper::getDateTime()],
            [
                'id' => $id,
            ]);
    }
}
