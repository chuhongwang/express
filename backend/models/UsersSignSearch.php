<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\UsersSign;

/**
 * UsersSignSearch represents the model behind the search form about `common\models\UsersSign`.
 */
class UsersSignSearch extends UsersSign
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'signin_day', 'created_at'], 'integer'],
            [['date', 'note'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     * @param array $params
     * @return ActiveDataProvider
     */
    public function search($id, $params)
    {
        $query = UsersSign::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => Yii::$app->params['pagination'],
        ]);


        $this->user_id = $id;

        $dataProvider->setSort(false);
        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'signin_day' => $this->signin_day,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'date', $this->date])
            ->andFilterWhere(['like', 'note', $this->note]);

        $query->addOrderBy('id desc');


        return $dataProvider;
    }
}
