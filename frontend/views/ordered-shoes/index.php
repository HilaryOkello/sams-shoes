<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\OrderedShoesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ordered Shoes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container col-sm-10 ordered-shoes-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            'order_id',
            'id',
            'shoe_id',
            'serial_number',
            'shoe_name',
            'shoe_price',
            'quantity',
            'status',

          
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
