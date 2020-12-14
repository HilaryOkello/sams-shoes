<?php 

/** @var $model \frontend\models\OrderedShoes */

use yii\helpers\Url;

$quantity=$model->quantity;
$price=$model->shoe_price;
$total=sprintf("%.02f",$quantity*$price);
?>

<div class="row border shadow-sm">
<div class="col-sm-6">
<div class="row">
		<img class="col-sm-3" src="<?php echo $model->getImageUrl() ?>" alt="Card image cap">
        <div class="col-sm-9">
        <h5><?php echo $model->shoe_name?></h5>
        <a href="#"><i class="far fa-heart"></i> Save</a> <a href="<?php echo Url::to(['/ordered-shoes/delete','id'=>$model->order_id]) ?>"><i class="far fa-trash-alt"></i> Remove</a>
        </div>
</div>

</div>
<div class="col-sm-2 border shadow-sm">
<p><?php echo $quantity?></p>
</div>
<div class="col-sm-2 border shadow-sm">
<p><?php echo $price?></p>
</div>
<div class="col-sm-2 border shadow-sm">
<p><?php echo $total?></p>
</div>
</div>
