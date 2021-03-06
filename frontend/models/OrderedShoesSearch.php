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
            [['order_id', 'id', 'shoe_id', 'serial_number', 'shoe_price', 'quantity', 'status'], 'integer'],
            [['shoe_name'], 'safe'],
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
            'serial_number' => $this->serial_number,
            'shoe_price' => $this->shoe_price,
            'quantity' => $this->quantity,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'shoe_name', $this->shoe_name]);

        return $dataProvider;
    }
}
