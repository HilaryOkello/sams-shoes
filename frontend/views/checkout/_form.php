<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\User;
use frontend\models\OrderedShoes;

/* @var $this yii\web\View */
/* @var $model frontend\models\Checkout */
/* @var $form yii\widgets\ActiveForm */

$items= ArrayHelper::map(OrderedShoes::find()
    ->where(['id'=> \Yii::$app->user->id])
    ->where(['status'=>0])
    ->all(), 'order_id', 'shoe_name');
$item_ids=ArrayHelper::map(OrderedShoes::find()
    ->where(['id'=> \Yii::$app->user->id])
    ->where(['status'=>0])
    ->all(), 'order_id', 'shoe_id');
$subtotal=OrderedShoes::find()

->where(['id' => \Yii::$app->user->id])
->where(['status'=>0])
->sum('shoe_price');


?>

<div class="checkout-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <!--<?= $form->field($model, 'id')->textInput() ?>-->

    <?= $form->field($model, 'amount')->textInput(['value'=> $subtotal,'readonly'=>true]) ?>
    
    <?php $model->items='my default value';?>

    <?= $form->field($model, 'items')->textInput(['value'=>implode(', ', $items), 'readonly'=>true]) ?>
    
    <?php $model->item_ids='my default value';?>

    <?= $form->field($model, 'item_ids')->textInput(['value'=>implode(', ', $item_ids), 'readonly'=>true]) ?>

    <?= $form->field($model, 'payment_method')->dropDownList([ 'MPESA' => 'MPESA', 'CARD PAYMENT' => 'CARD PAYMENT', 'CASH ON DELIVERY' => 'CASH ON DELIVERY', '' => '', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
    
    <!-- <?= $form->field($model, 'status')->textInput() ?>-->

    <div class="form-group">
        <?= Html::submitButton('Finish', ['class' => 'btn btn-outline-dark btn-sm']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
