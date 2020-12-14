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

<?php if(Yii::$app->user->can('admin')): ?>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->checkout_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->checkout_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
 <?php endif; ?>
 <p><?= Html::a('Generate PDF', ['gen-pdf', 'id' => $model->checkout_id], ['class' => 'btn btn-primary']) ?></p>
 <h3><?php echo Yii::$app->user->identity->username?></h3>
    <?= DetailView::widget([
        'model' => $model, 
        'attributes' => [
            'checkout_id',
            //'id',
            'amount',
            'items',
            'item_ids',
            'payment_method',
            'address',
            'status',
        ],
    ]) ?>

</div>
