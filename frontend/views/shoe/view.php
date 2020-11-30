<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Shoe */

$this->title = $model->shoe_id;
$this->params['breadcrumbs'][] = ['label' => 'Shoes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="container shoe-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->shoe_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->shoe_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                
                'attribute' => 'has_thumbnail',
                
                'label' => 'Photo',
                'format' => ['image',['width'=>'300','height'=>'250','align'=>'left']],
                'value' => function ($model) {
                return $model->getImageUrl();
                },
                
                ],
            'shoe_id',
            'serial_number',
            'shoe_name',
            'shoe_price',
            'shoe_size',
            'quantity',
            'brand_id',
            'description:ntext',
            'tags',
            'status',
            'created_at'
        ],
    ]) ?>

</div>
