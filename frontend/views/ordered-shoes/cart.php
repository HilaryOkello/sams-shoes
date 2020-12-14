<?php
/** @var $dataProvider \yii\data\ActiveDataProvider */
/** @var $models \frontend\models\OrderedShoes */
/** @var $model \frontend\models\OrderedShoes */


use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use frontend\models\OrderedShoes;


$model = new OrderedShoes();
$quantity=$model->quantity;
$price=$model->shoe_price;
$total=sprintf("%.02f",$quantity*$price);
$subtotal=OrderedShoes::find()

->where(['id' => \Yii::$app->user->id])
->where(['status'=>0])
->sum('shoe_price');
$vat=sprintf("%.02f",0.16*$subtotal);
$item_ids=ArrayHelper::map(OrderedShoes::find()
    ->where(['id'=> \Yii::$app->user->id])
    ->where(['status'=>0])
    ->all(), 'order_id', 'shoe_id');

?>

<div class="container border rounded shadow-sm">
<div class="row border shadow-sm">
<div class="col-sm-6">
<h6>ITEM</h6>
</div>
<div class="col-sm-2">
<h6>QUANTITY</h6>
</div>
<div class="col-sm-2">
<h6>UNIT PRICE(KSh.)</h6>
</div>
<div class="col-sm-2">
<h6>SUB-TOTAL(KSh.)</h6>
</div>
</div>
<?php
echo \yii\widgets\ListView::widget([
    'dataProvider' => $dataProvider,
    'pager' => [
        'class' => \yii\bootstrap4\LinkPager::class,
    ],
    'itemView' => '_cart_item',
/*     'layout' => '<div class="col-sm-12 d-flex flex-wrap">{items}</div>{pager}',
 */    'itemOptions' => [
        'tag' => false,

    ]
]);


?>

<div class="resume">
<div class="row ft-subtotal">
<label>Subtotal:</label>
<div><?php echo $subtotal;?></div>
</div>
<div class="row tax"><label>VAT:</label><div><span data-currency-iso="KES">KSh</span> <span dir="ltr" data-price="5.53"><?php echo $vat;?></span> </div></div>
<div class="row total ft-total"><label>Total:</label><div class="ft-total-panel"><span data-currency-iso="KES">KSh</span> <span dir="ltr" data-price="1044"><?php echo $subtotal;?></span> </div></div>
</div>
<div class="summary-footer">
<div class="container">
<a href="<?php echo Url::to(['/shoe/shop']) ?>" class="btn btn-outline-dark btn-sm">  <span class="label ">Continue Shopping</span>    </a>
<a href="<?php echo Url::to(['/checkout/create','order_id'=> $model->order_id]) ?>" class="btn btn-outline-dark btn-sm">  <span class="label ">Proceed to Checkout</span>    </a>
</div>
</div>
</div>
