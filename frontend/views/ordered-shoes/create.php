<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\OrderedShoes */

$this->title = 'Order Shoes';
$this->params['breadcrumbs'][] = ['label' => 'Ordered Shoes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container col-sm-5 ordered-shoes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
