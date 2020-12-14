<?php

namespace frontend\models;

use common\models\User;
use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "{{%ordered_shoes}}".
 *
 * @property int $order_id
 * @property int $id
 * @property int $shoe_id
 * @property int $serial_number
 * @property string $shoe_name
 * @property int $shoe_price
 * @property int $quantity
 * @property int $status 0 represents cart, 1 ordered, 2 shipped, 3 delivered

 * @property User $id0
 * @property Shoe $shoe
 */
class OrderedShoes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%ordered_shoes}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'shoe_id', 'serial_number','shoe_name', 'shoe_price', 'quantity'], 'required'],
            [['id', 'shoe_id', 'serial_number','shoe_price', 'quantity', 'status'], 'integer'],
            [['shoe_name'], 'string', 'max' => 512],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id' => 'id']],
            [['shoe_id'], 'exist', 'skipOnError' => true, 'targetClass' => Shoe::className(), 'targetAttribute' => ['shoe_id' => 'shoe_id']],
            ['quantity','default','value'=> 1]
            
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'order_id' => 'Order ID',
            'id' => 'ID',
            'shoe_id' => 'Shoe ID',
            'serial_number' => 'Serial Number',
            'shoe_name' => 'Shoe Name',
            'shoe_price' => 'Shoe Price',
            'quantity' => 'Quantity',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Id0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(User::className(), ['id' => 'id']);
    }

    /**
     * Gets query for [[Shoe]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getShoe()
    {
        return $this->hasOne(Shoe::className(), ['shoe_id' => 'shoe_id']);
    }
    public function getCheckout()
    {
        return $this->hasMany(Checkout::className(), ['shoe_id' => 'item_ids']);
    }
    public static function find()
    {
        return new \frontend\models\query\OrderedShoesQuery(get_called_class());
    }
    public function isAdded($shoe_id)
    {
        return OrderedShoes::find()->andWhere([
            'order_id' => $this->order_id,
            'shoe_id' => $shoe_id
        ])->one();
    }
    public function getImageUrl()
    {
        return Url::to('@web/frontend/web/storage/thumbs/' . $this->serial_number. '.jpg', true);
    }
    public function __toString()
    
    {
        
        return $this->order_id;
        
    }

}
