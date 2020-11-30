<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use frontend\models\Brand;
use yii\bootstrap4\Modal;

/* @var $this yii\web\View */
/* @var $model frontend\models\Shoe */
/* @var $form yii\bootstrap4\\ActiveForm */

\frontend\assets\TagsInputAsset::register($this);

$brands = ArrayHelper::map(Brand::find()->all(), 'brand_id', 'brand_name');
?>

<div class="container col-10 h-75 shoe-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <?= $form->field($model, 'serial_number')->textInput() ?>

    <?= $form->field($model, 'shoe_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'shoe_price')->textInput() ?>

    <?= $form->field($model, 'shoe_size')->textInput() ?>
    
    <?= $form->field($model, 'quantity')->textInput() ?>
    <div class="row">
    <div class="col-sm-6">
    	<?= $form->field($model, 'brand_id')->dropDownList($brands,['placeholder'=>'Select brand'])->label(false) ?>
    </div> 
    <div class="col-sm-4">
    	<button type="button" class="btn btn-block btn-outline-dark btn-small addbrand"><i class="fa fa-plus" aria-hidden="true"></i> Add Brand</button>
    </div> 
    </div>
    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tags', [
                'inputOptions' => ['data-role' => 'tagsinput']])->textInput(['maxlength' => true]) ?>

    /* <?= $form->field($model, 'status')->textInput() ?> */

    <div class="form-group">
        <label><?php echo $model->getAttributeLabel('thumbnail') ?></label>
        <div class="custom-file">
            <input type="file" class="custom-file-input"
                   id="thumbnail" name="thumbnail">
            <label class="custom-file-label" for="thumbnail">Choose file</label>
        </div>
     </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-outline-dark btn-sm']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

      <?php
        Modal::begin([
            'id'=>'addbrand',
            'size'=>'modal-lg'
            ]);

        echo "<div id='addbrandContent'></div>";
        Modal::end();
      ?>