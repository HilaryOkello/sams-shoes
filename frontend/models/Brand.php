<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%brand}}".
 *
 * @property int $brand_id
 * @property string $brand_name
 *
 * @property Shoebrand[] $shoebrands
 */
class Brand extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%brand}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['brand_name'], 'required'],
            [['brand_name'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'brand_id' => 'Brand ID',
            'brand_name' => 'Brand Name',
        ];
    }

    /**
     * Gets query for [[Shoebrands]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getShoebrands()
    {
        return $this->hasMany(Shoebrand::className(), ['brand_id' => 'brand_id']);
    }
}
