<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%mail}}".
 *
 * @property int $mail_id
 * @property string $name
 * @property string $email
 */
class Mail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%mail}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email'], 'required'],
            [['name'], 'string'],
            [['email'], 'string', 'max' => 11],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'mail_id' => 'Mail ID',
            'name' => 'Name',
            'email' => 'Email',
        ];
    }
}
