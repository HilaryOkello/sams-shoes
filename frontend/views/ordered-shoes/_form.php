<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\OrderedShoes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="container ordered-shoes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'shoe_id')->textInput() ?>

    <?= $form->field($model, 'serial_number')->textInput() ?>
    
    <?= $form->field($model, 'shoe_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'shoe_price')->textInput() ?>
    
    <?= $form->field($model, 'quantity')->textInput() ?>
    
    <?= $form->field($model, 'status')->textInput() ?>
    

    <div class="form-group">
        <?= Html::submitButton('Proceed to checkout', ['class' => 'btn btn-outline-dark btn-sm']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
