<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/** @var $model \frontend\models\Shoe */

$this->title = 'Shoes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid col-sm-10 shoe-index">
<div>
</div>

    <h1><?= Html::encode($this->title) ?></h1>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                
                'attribute' => 'has_thumbnail',
                
                'label' => 'Photo',
                'format' => ['image',['width'=>'75','height'=>'50']],
                'value' => function ($model) {
                return $model->getImageUrl();
                },
                
            ],
           // 'shoe_id',
            'serial_number',
            'shoe_name',
            'shoe_price',
            'shoe_size',
            'quantity',
            [
                
                'attribute' => 'brand_id',
                
                'label' => 'Brand',
                
                'value' => 'brand.brand_name',
                
            ],
            'description:ntext',
            'tags',
            [
                'label' => 'update',
                'value' => '2'
            ],
            //'status'
            [
                'label' => 'delete',
                'value' => '2'
            ],
            //'has_thumbnail',
            //'created_at:datetime',

/*             ['class' => 'yii\grid\ActionColumn'],
 */        ],
    ]); ?>


</div>
