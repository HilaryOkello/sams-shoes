<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Checkout;

/**
 * CheckoutSearch represents the model behind the search form of `frontend\models\Checkout`.
 */
class CheckoutSearch extends Checkout
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['checkout_id', 'id', 'amount', 'status'], 'integer'],
            [['items', 'item_ids', 'payment_method', 'address'], 'safe'],
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
        $query = Checkout::find();

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
            'checkout_id' => $this->checkout_id,
            'id' => $this->id,
            'amount' => $this->amount,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'items', $this->items])
            ->andFilterWhere(['like', 'item_ids', $this->item_ids])
            ->andFilterWhere(['like', 'payment_method', $this->payment_method])
            ->andFilterWhere(['like', 'address', $this->address]);

        return $dataProvider;
    }
}
