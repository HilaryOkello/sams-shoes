<?php

use yii\helpers\Url;

/** @var $model \frontend\models\Shoe */

?>
    <div class="card">
		<a class="card-title" href="<?php echo Url::to(['/shoe/view', 'id' => $model->shoe_id]) ?>">
            <img class="" src="<?php echo $model->getImageUrl() ?>" alt="Card image cap">
            <div class="card-body">
            <h5 class="card-title"><?php echo $model->shoe_name,'        Ksh.' .$model->shoe_price?></h5>
            </div> 
		</a>
    </div>
