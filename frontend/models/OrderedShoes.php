<?php

namespace frontend\models;

use common\models\User;
use Yii;
/**
 * This is the model class for table "{{%ordered_shoes}}".
 *
 * @property int $order_id
 * @property int $id
 * @property int $shoe_id
 * @property string $payment_method
 * @property string $delivery_method
 * @property string $expected_delivery_date
 * @property string $actual_delivery_date
 * @property string $status
 * @property string $address
 *
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
            [['id', 'shoe_id'], 'required'],
            [['id', 'shoe_id'], 'integer'],
            [['payment_method', 'delivery_method', 'status'], 'string'],
            [['expected_delivery_date', 'actual_delivery_date'], 'safe'],
            [['address'], 'string', 'max' => 512],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id' => 'id']],
            [['shoe_id'], 'exist', 'skipOnError' => true, 'targetClass' => Shoe::className(), 'targetAttribute' => ['shoe_id' => 'shoe_id']],
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
            'payment_method' => 'Payment Method',
            'delivery_method' => 'Delivery Method',
            'expected_delivery_date' => 'Expected Delivery Date',
            'actual_delivery_date' => 'Actual Delivery Date',
            'status' => 'Status',
            'address' => 'Address',
        ];
    }

    /**
     * Gets query for [[Id0]].
     *
     * @return \yii\db\ActiveQuery|\frontend\models\query\UserQuery
     */
    public function getId0()
    {
        return $this->hasOne(User::className(), ['id' => 'id']);
    }

    /**
     * Gets query for [[Shoe]].
     *
     * @return \yii\db\ActiveQuery|\frontend\models\query\ShoeQuery
     */
    public function getShoe()
    {
        return $this->hasOne(Shoe::className(), ['shoe_id' => 'shoe_id']);
    }

    /**
     * {@inheritdoc}
     * @return \frontend\models\query\OrderedShoesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\query\OrderedShoesQuery(get_called_class());
    }
    public function isAdded($order_id)
    {
        return OrderedShoes::find()->andWhere([
            'shoe_id' => $this->id,
            'order_id' => $order_id
        ])->one();
    }
}
