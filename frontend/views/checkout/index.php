<?php

use frontend\models\Checkout;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CheckoutSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Checkouts';
$this->params['breadcrumbs'][] = $this->title;
$item= ArrayHelper::map(Checkout::find()
    ->where(['id'=> \Yii::$app->user->id])
    ->where(['status'=>0])
    ->all(), 'item_ids', 'item_ids');
$items=implode(',', $item);
?>
<div class=" container checkout-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <h1><?php echo $items?></h1>

    <p>
        <?= Html::a('Create Checkout', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        /* 'filterModel' => $searchModel, */
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'checkout_id',
            //'id',
            'amount',
            'items',
            'item_ids',
            'payment_method',
            'address',
     [
         'label'=>'Status',
         'format' => 'raw',
         'value' => function ($dataProvider) {
         $orderStatus = Checkout::find()->where(['checkout_id'=>$dataProvider->checkout_id])->One();
         if($orderStatus->status == 0){
             $button = 'btn btn-info';
             $status = 'ordered';
         }elseif ($orderStatus->status == 1){
             $button = 'btn btn-success';
             $status = 'shipped';
         }elseif ($orderStatus->status == 2){
             $button = 'btn btn-warning';
             $status = 'delivered';
         }
         return '<span class="'.$button.'">'.$status.'</span>';
         },
         
         ],
         [
             'label'=>'Shipping',
             'format' => 'raw',
             'value' => function ($dataProvider) {
             $orderStatus = Checkout::find()->where(['checkout_id'=>$dataProvider->checkout_id])->One();
             if(\Yii::$app->user->can('admin') && $orderStatus->status == 0){
                 return Html::a('Ship', ['ship','id'=>$dataProvider->id,'checkout_id'=>$dataProvider->checkout_id], ['class' => 'btn btn-success ship']);
             }elseif($orderStatus->status == 1){
                 return 'On the way';
             }elseif($orderStatus->status == 0){
                 return 'Not yet';
             }
                return 'Shipped';
             },
             
             ],
             [
                 'label'=>'Delivery',
                 'format' => 'raw',
                 'value' => function ($dataProvider) {
                 $orderStatus = Checkout::find()->where(['checkout_id'=>$dataProvider->checkout_id])->One();
                 if(\Yii::$app->user->can('admin') && $orderStatus->status == 1){
                     return Html::a('Deliver', ['deliver','checkout_id'=>$dataProvider->checkout_id], ['class' => 'btn btn-success deliver']);
                 }elseif($orderStatus->status == 2){
                     return 'Delivered';
                 }
                     return 'Not yet';
                                
                 }
                 
                 ],

        ],
    ]); ?>


</div>
