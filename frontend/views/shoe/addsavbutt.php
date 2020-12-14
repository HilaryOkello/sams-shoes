<?php


/* @var $this yii\web\View */
/* @var $model frontend\models\Shoe */

use yii\helpers\Url;
$shoe_id=$model->shoe_id;
?>   

        <a class="btn btn-sm <?php echo $model->isAdded($shoe_id) ? 'btn-secondary' : 'btn-outline-dark'?>"
        href="<?php echo Url::to(['/ordered-shoes/create','shoe_id'=>$model->shoe_id,'serial_number'=>$model->serial_number,'shoe_name'=>$model->shoe_name,'shoe_price'=>$model->shoe_price]) ?>"
         data-method="post" data-pjax="1" >Add to cart</a> 
         <!--<a href="">
         <i class="far fa-heart"></i> Save</a>  -->
   
    