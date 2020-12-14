<?php

namespace frontend\models;

use common\models\User;
use Yii;

/**
 * This is the model class for table "{{%checkout}}".
 *
 * @property int $checkout_id
 * @property int $id
 * @property int $amount
 * @property int $items
 * @property string $item_ids
 * @property string $payment_method
 * @property string $address
 * @property int $status status 0 represents ordered, status 1 represents shipped, and status 2 represents delivered
 *
 *
 * @property User $id0
 */
class Checkout extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%checkout}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'amount', 'items', 'payment_method', 'address'], 'required'],
            [['id', 'amount', 'status'], 'integer'],
            [['payment_method'], 'string'],
            [['items','item_ids'], 'string', 'max' => 1000],
            [['address'], 'string', 'max' => 512],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'checkout_id' => 'Order Number',
            'id' => 'ID',
            'amount' => 'Amount',
            'items' => 'Items',
            'item_ids' => 'Item Ids',
            'payment_method' => 'Payment Method',
            'address' => 'Address',
            'status' => 'Status',
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
    public function getOrderedShoes()
    {
        return $this->hasMany(Checkout::className(), ['item_idsFK' => 'shoe_id']);
    }

    /**
     * {@inheritdoc}
     * @return \frontend\models\query\CheckoutQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\query\CheckoutQuery(get_called_class());
    }
}
