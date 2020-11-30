<?php

namespace frontend\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\helpers\FileHelper;
use yii\helpers\Url;
use yii\imagine\Image;
use Imagine\Image\Box;


/**
 * This is the model class for table "{{%shoe}}".
 *
 * @property int $shoe_id
 * @property int $serial_number
 * @property string $shoe_name
 * @property int $shoe_price
 * @property int $shoe_size
 * @property int $quantity
 * @property int $brand_id
 * @property string|null $description
 * @property string|null $tags
 * @property int|null $status
 * @property int|null $has_thumbnail
 * @property int|null $created_at
 * @property int|null updated_at

 * 
 * @property OrderedShoes[] $orderedShoes
 * @property Brand $brand
 */
class Shoe extends \yii\db\ActiveRecord
{
    
    /**
     *
     * @var \yii\web\UploadedFile
     */
    public $thumbnail;
    public $shoe;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%shoe}}';
    }
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
           
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['serial_number', 'shoe_name', 'shoe_price', 'shoe_size', 'quantity','brand_id','has_thumbnail'], 'required'],
            [['serial_number', 'shoe_price', 'shoe_size', 'quantity', 'brand_id', 'status', 'has_thumbnail',], 'integer'],
            [['description'], 'string'],
            [['shoe_name', 'tags'], 'string', 'max' => 512],
            [['brand_id'], 'exist', 'skipOnError' => true, 'targetClass' => Brand::className(), 'targetAttribute' => ['brand_id' => 'brand_id']],
            ['has_thumbnail', 'default', 'value' => 0],
            ['thumbnail', 'image', 'minWidth' => 300],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'shoe_id' => 'Shoe ID',
            'serial_number' => 'Serial Number',
            'shoe_name' => 'Shoe Name',
            'shoe_price' => 'Shoe Price',
            'shoe_size' => 'Shoe Size',
            'quantity' => 'Quantity',
            'brand_id' => 'Brand',
            'description' => 'Description',
            'tags' => 'Tags',
            'status' => 'Status',
            'has_thumbnail' => 'Has Thumbnail',
            'thumbnail' => 'Thumbnail',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            
        ];
    }
    
    /**
     * Gets query for [[OrderedShoes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderedShoes()
    {
        return $this->hasMany(OrderedShoes::className(), ['shoe_id' => 'shoe_id']);
    }
    /**
     * Gets query for [[Brand]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBrand()
    {
        return $this->hasOne(Brand::className(), ['brand_id' => 'brand_id']);
    }
    

    /**
     * Gets query for [[Shoebrands]].
     *
     * @return \yii\db\ActiveQuery
     */
/*     public function getShoebrands()
    {
        return $this->hasMany(Shoebrand::className(), ['shoe_id' => 'shoe_id']);
    } */


    /**
     * {@inheritdoc}
     * @return \frontend\models\query\ShoeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\query\ShoeQuery(get_called_class());
    }
    
    public function save($runValidation = true, $attributeNames = null)
    {
        if ($this->thumbnail) {
            $this->has_thumbnail = 1;
        }
        $saved = parent::save($runValidation, $attributeNames);
        if (!$saved) {
            return false;
        }
        if ($this->thumbnail) {
            $thumbnailPath = Yii::getAlias('@frontend/web/storage/thumbs/' . $this->serial_number . '.jpg');
            if (!is_dir(dirname($thumbnailPath))) {
                FileHelper::createDirectory(dirname($thumbnailPath));
            }
            $this->thumbnail->saveAs($thumbnailPath);
            Image::getImagine()
            ->open($thumbnailPath)
            ->thumbnail(new Box(300, 250))
            ->save();
        }
    
        
        return true;
    }
    public function getThumbnailLink()
    {
        Yii::$app->params['frontendUrl'] . '/frontend/web/storage/thumbs/' . $this->serial_number . '.jpg';
    }
    public function getImageUrl()
    {
        return Url::to('@web/frontend/web/storage/thumbs/' . $this->serial_number. '.jpg', true);
    }
}
