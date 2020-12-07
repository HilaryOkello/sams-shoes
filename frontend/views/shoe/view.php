<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use frontend\models\Brand;

/* @var $this yii\web\View */
/* @var $model frontend\models\Shoe */
/** @var $dataProvider \yii\data\ActiveDataProvider */

$this->title = $model->shoe_id;
$this->params['breadcrumbs'][] = ['label' => 'Shoes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="container shoe-view">

<?php if(Yii::$app->user->can('admin')): ?>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->shoe_id], ['class' => 'btn btn-outline-dark btn-sm']) ?>
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
            [
                
                'attribute' => 'brand_id',
                
                'label' => 'Brand',
                
                'value' => function ($data) {
                return Brand::findOne(['brand_id'=>$data->brand_id])->brand_name;
                },
                
            ],
            'description:ntext',
            'tags',
            'status',
            'created_at'
        ],
    ]) ?>
<?php else: ?>
<div class="container border shadow-sm rounded">
<div class="row">
<div class="col-sm-4">
<img class="border shadow-lg" src="<?php echo $model->getImageUrl() ?>" alt="Card image cap">
<h5 class="card-title"><?php echo $model->shoe_name,'        Ksh.' .$model->shoe_price?></h5> 
    <?php \yii\widgets\Pjax::begin() ?>
        <a href="<?php echo Url::to(['/ordered-shoes/create']) ?>"
         class="btn btn-outline-dark btn-sm"
         data-method="post" data-pjax="1" >Add to cart</a> 
         <a href="<?php echo Url::to(['/orderded-shoes/create']) ?>">
         <i class="far fa-heart"></i> Save</a>
    <?php \yii\widgets\Pjax::end() ?>

</div>
<div class="col-sm-8">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'shoe_name',
            'shoe_price',
            'shoe_size',
            'quantity',
            [
                
                'attribute' => 'brand_id',
                
                'label' => 'Brand',
                
                'value' => function ($data) {
                return Brand::findOne(['brand_id'=>$data->brand_id])->brand_name;
                },
                
            ],
            'description:ntext',
            'tags',
        ],
    ]) ?>
</div>
</div>
</div>
<?php endif; ?>
</div>
