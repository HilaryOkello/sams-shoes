<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\OrderedShoes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="container ordered-shoes-form">

    <?php $form = ActiveForm::begin(); ?>

  <!--<?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'shoe_id')->textInput() ?>--> 

    <?= $form->field($model, 'payment_method')->dropDownList([ 'M-PESA' => 'M-PESA', 'Card Payment' => 'Card Payment', 'On Delivery' => 'On Delivery', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'delivery_method')->dropDownList([ 'Pick up Location' => 'Pick up Location', 'Door Delivery' => 'Door Delivery', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'expected_delivery_date')->textInput() ?>

    <!--<?= $form->field($model, 'actual_delivery_date')->textInput() ?>-->

    <!-- <?= $form->field($model, 'status')->dropDownList([ 'Ordered' => 'Ordered', 'Shipped' => 'Shipped', 'Delivered' => 'Delivered', ], ['prompt' => '']) ?>-->

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Proceed to checkout', ['class' => 'btn btn-outline-dark btn-sm']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
