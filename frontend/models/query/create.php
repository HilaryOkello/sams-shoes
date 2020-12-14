<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Checkout */

$this->title = 'Checkout';
$this->params['breadcrumbs'][] = ['label' => 'Checkouts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container border col-sm-4 shadow-sm checkout-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
