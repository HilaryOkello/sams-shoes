<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\OrderedShoes;

/**
 * OrderedShoesSearch represents the model behind the search form of `frontend\models\OrderedShoes`.
 */
class OrderedShoesSearch extends OrderedShoes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'id', 'shoe_id'], 'integer'],
            [['payment_method', 'delivery_method', 'expected_delivery_date', 'actual_delivery_date', 'status', 'address'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = OrderedShoes::find();

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
            'order_id' => $this->order_id,
            'id' => $this->id,
            'shoe_id' => $this->shoe_id,
            'expected_delivery_date' => $this->expected_delivery_date,
            'actual_delivery_date' => $this->actual_delivery_date,
        ]);

        $query->andFilterWhere(['like', 'payment_method', $this->payment_method])
            ->andFilterWhere(['like', 'delivery_method', $this->delivery_method])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'address', $this->address]);

        return $dataProvider;
    }
}
