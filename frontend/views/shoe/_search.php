<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ShoeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shoe-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'shoe_id') ?>

    <?= $form->field($model, 'serial_number') ?>

    <?= $form->field($model, 'shoe_name') ?>

    <?= $form->field($model, 'shoe_price') ?>

    <?= $form->field($model, 'shoe_size') ?>

    <?php // echo $form->field($model, 'quantity') ?>

    <?php // echo $form->field($model, 'brand_id') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'tags') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'has_thumbnail') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
