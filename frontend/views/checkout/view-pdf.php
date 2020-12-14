<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Checkout */

$this->title = $model->checkout_id;
$this->params['breadcrumbs'][] = ['label' => 'Checkouts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="container checkout-view">
<h3><?php echo Yii::$app->user->identity->username?></h3>

    <?= DetailView::widget([
        'model' => $model, 
        'attributes' => [
            'checkout_id',
            'amount',
            'items',
            'payment_method',
            'address',
        ],
    ]) ?>

</div>
