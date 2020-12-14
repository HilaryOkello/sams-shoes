<?php

namespace frontend\models\query;

use Yii;

/**
 * This is the ActiveQuery class for [[\frontend\models\OrderedShoes]].
 *
 * @see \frontend\models\OrderedShoes
 */
class OrderedShoesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \frontend\models\OrderedShoes[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \frontend\models\OrderedShoes|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
    public function latest()
    {
        return $this->orderBy(['id' => Yii::$app->user->id])->where(['status'=>0]);
    }
}
