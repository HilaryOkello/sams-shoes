<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Brand */
/* @var $form ActiveForm */
?>
<div class="brand">

    <?php $form = ActiveForm::begin([
            'action' =>['shoe/addbrand'],
            'method'=>'post',
            'id'=>'adda'
        ]); ?>

        <?= $form->field($model, 'brand_name') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-outline-dark btn-sm']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- addbrand -->