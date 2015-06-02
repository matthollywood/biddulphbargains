<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TblOffers;

/**
 * TblOffersSearch represents the model behind the search form about `backend\models\TblOffers`.
 */
class TblOffersSearch extends TblOffers
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['offer_id', 'id'], 'integer'],
            [['offer_description', 'offer_start_date', 'offer_end_date', 'offer_type_id'], 'safe'],
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
        $query = TblOffers::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
		
		$query->joinWith('offerType');

        $query->andFilterWhere([
            'offer_id' => $this->offer_id,
            'id' => $this->id = Yii::app()->user->id,
            'offer_start_date' => $this->offer_start_date,
            'offer_end_date' => $this->offer_end_date,
        ]);

        $query->andFilterWhere(['like', 'offer_description', $this->offer_description])
			  ->andFilterWhere(['like', 'tbl_offer_types.offer_type', $this->offer_type_id]);

        return $dataProvider;
    }
}
