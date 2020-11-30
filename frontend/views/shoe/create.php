<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Shoe */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $name string */


$this->title = 'Add Items';
$this->params['breadcrumbs'][] = ['label' => 'Shoes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php if(Yii::$app->user->can('admin')): ?>

<div class="container col-6 h-75 border rounded shoe-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
<?php endif; ?>
