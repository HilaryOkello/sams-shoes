<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\OrderedShoesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ordered-shoes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'order_id') ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'shoe_id') ?>

    <?= $form->field($model, 'serial_number') ?>

    <?= $form->field($model, 'shoe_name') ?>

    <?php // echo $form->field($model, 'shoe_price') ?>

    <?php // echo $form->field($model, 'quantity') ?>
    
    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
