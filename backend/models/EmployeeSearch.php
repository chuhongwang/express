<?php

namespace backend\models;

use common\components\DateHelper;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Employee;

/**
 * EmployeeSearch represents the model behind the search form about `common\models\Employee`.
 */
class EmployeeSearch extends Employee
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'gender', 'pointId'], 'integer'],
            [['name', 'phone', 'email', 'birthday', 'address'], 'safe'],
            [['name','gender','phone','email','birthday','address','pointId'],'required'],
            ['email','email'],
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
        $query = Employee::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);


        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'gender' => $this->gender,
            'birthday' => $this->birthday,
            'pointId' => $this->pointId,
        ]);
        $query->andWhere(['delete_flag'=>1]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'address', $this->address])->with('point');

        return $dataProvider;
    }

    public function getData($params)
    {
        $id = $params['EmployeeSearch']['id'];
        $model = Employee::find()->andFilterWhere(['id' => $id])->andFilterWhere(['delete_flag' => 1])->asArray()->one();
        if (empty($model)) {
            return false;
        } else {
            $this->id = $model['id'];
            $this->name = $model['name'];
            $this->gender = $model['gender'];
            $this->phone = $model['phone'];
            $this->email = $model['email'];
            $this->birthday = $model['birthday'];
            $this->address = $model['address'];
            $this->pointId = $model['pointId'];
            return true;
        }
    }

    public function EditEmployee($params){
        $this->load($params);
        if(!empty($this->id)){
            $model=Employee::find()->andFilterWhere(['id'=>$this->id])->andFilterWhere(['delete_flag'=>1])->one();
            $model->name=$this->name;
            $model->gender=$this->gender;
            $model->phone=$this->phone;
            $model->email=$this->email;
            $model->birthday=$this->birthday;
            $model->address=$this->address;
            $model->pointId=$this->pointId;
            $model->update_time=DateHelper::getDateTime();
            $res=$model->save();
            return $res;
        }
    }

    public function getDelete($id, $delete_flag)
    {
        return Employee::updateAll(['delete_flag' => $delete_flag, 'delete_time' => DateHelper::getDateTime()],
            [
                'id' => $id,
            ]);
    }
}
