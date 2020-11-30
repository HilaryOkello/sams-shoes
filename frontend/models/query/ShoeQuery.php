<?php

namespace frontend\models\query;

/**
 * This is the ActiveQuery class for [[\frontend\models\Shoe]].
 *
 * @see \frontend\models\Shoe
 */
class ShoeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \frontend\models\Shoe[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \frontend\models\Shoe|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
    public function latest()
    {
        return $this->orderBy(['created_at' => SORT_DESC]);
    }
    public function mens()
    {
        return $this->andWhere(['like','tags','men']);
        
    }
    public function womens()
    {
        return $this->andWhere(['like','tags','women']);
        
    }
    public function kids()
    {
        return $this->andWhere(['like','tags','kids']);
        
    }
    public function Accessories()
    {
        return $this->andWhere(['like','tags','accessory']);
        
    }
    public function Sales()
    {
        return $this->andWhere(['like','tags','sale']);
        
    }
    
    public function byKeyword($keyword)
    {
        return $this->andWhere("MATCH(shoe_name, description, tags)
        AGAINST (:keyword)", ['keyword' => $keyword]);
    }
}
