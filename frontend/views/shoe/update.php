<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Shoe */

$this->title = 'Update Shoe: ' . $model->shoe_id;
$this->params['breadcrumbs'][] = ['label' => 'Shoes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->shoe_id, 'url' => ['view', 'id' => $model->shoe_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="shoe-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
