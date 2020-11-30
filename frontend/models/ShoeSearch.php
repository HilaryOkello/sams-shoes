<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Shoe;

/**
 * ShoeSearch represents the model behind the search form of `frontend\models\Shoe`.
 */
class ShoeSearch extends Shoe
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['shoe_id', 'serial_number', 'shoe_price', 'shoe_size', 'quantity', 'brand_id', 'status', 'has_thumbnail'], 'integer'],
            [['shoe_name', 'description', 'tags'], 'safe'],
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
        $query = Shoe::find();

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
            'shoe_id' => $this->shoe_id,
            'serial_number' => $this->serial_number,
            'shoe_price' => $this->shoe_price,
            'shoe_size' => $this->shoe_size,
            'quantity' => $this->quantity,
            'brand_id' => $this->brand_id,
            'status' => $this->status,
            'has_thumbnail' => $this->has_thumbnail,
        ]);

        $query->andFilterWhere(['like', 'shoe_name', $this->shoe_name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'tags', $this->tags]);

        return $dataProvider;
    }
}
