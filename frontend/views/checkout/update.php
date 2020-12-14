<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Checkout */

$this->title = 'Update Checkout: ' . $model->checkout_id;
$this->params['breadcrumbs'][] = ['label' => 'Checkouts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->checkout_id, 'url' => ['view', 'id' => $model->checkout_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="checkout-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
