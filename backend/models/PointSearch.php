<?php

namespace backend\models;

use common\components\DateHelper;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Point;

/**
 * PointSearch represents the model behind the search form about `common\models\Point`.
 */
class PointSearch extends Point
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'address', 'phone', 'email'], 'safe'],
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
        $query = Point::find();

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
            'delete_flag'=>1,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'email', $this->email]);
        $dataProvider->setSort(false);
        return $dataProvider;
    }

    public function getData($params)
    {
        $id = $params['PointSearch']['id'];
        $model = Point::find()->andFilterWhere(['id' => $id])->andFilterWhere(['delete_flag' => 1])->asArray()->one();
        if (empty($model)) {
            return false;
        } else {
            $this->id = $model['id'];
            $this->name = $model['name'];
            $this->address = $model['address'];
            $this->phone = $model['phone'];
            $this->email = $model['email'];
            return true;
        }
    }

    public function EditPoint($params){
        $this->load($params);
        if(!empty($this->id)){
            $model=Point::find()->andFilterWhere(['id'=>$this->id])->andFilterWhere(['delete_flag'=>1])->one();
            $model->name=$this->name;
            $model->address=$this->address;
            $model->phone=$this->phone;
            $model->email=$this->email;
            $model->update_time=DateHelper::getDateTime();
            $res=$model->save();
            return $res;
        }
    }

    public function getDelete($id, $delete_flag)
    {
        return Point::updateAll(['delete_flag' => $delete_flag, 'delete_time' => DateHelper::getDateTime()],
            [
                'id' => $id,
            ]);
    }
}
