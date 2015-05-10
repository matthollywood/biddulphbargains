<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Your;

/**
 * YourSearch represents the model behind the search form about `frontend\models\Your`.
 */
class YourSearch extends Your
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['offer_id', 'id', 'offer_type_id'], 'integer'],
            [['offer_description', 'offer_start_date', 'offer_end_date'], 'safe'],
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
        $query = Your::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'offer_id' => $this->offer_id,
            'id' => $this->id,
            'offer_type_id' => $this->offer_type_id,
            'offer_start_date' => $this->offer_start_date,
            'offer_end_date' => $this->offer_end_date,
        ]);

        $query->andFilterWhere(['like', 'offer_description', $this->offer_description]);

        return $dataProvider;
    }
}
