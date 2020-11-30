<?php

/* @var $this yii\web\View */
/** @var $model \frontend\models\Shoe */
/** @var $dataProvider \yii\data\ActiveDataProvider */



use yii\helpers\Url;

$this->title = 'Sams Shoes';
?>
<div>
    <div class="container newproduct">
    <div class="corner-text">
        <h1 class=hed-1>Built for<br> Flight</h1>
        <p class=par-1>Introducing <strong>Pumzi</strong><br>Our lightest shoe, ever</p>
        <a href="/sams/shoe/shop" class="btn btn-dark rounded-pill">SHOP</a>
        
    </div>
        
    </div>
    <div class="row-0">
            <div class="row">
            <a href="<?php echo Url::to(['/shoe/womens']) ?>" class="custom-card">
                <div class="col-sm-3 card-1">
                    <img class=""src="/sams/css/images/women.jpg" alt="Card image cap">
                    <div class="card-img-overlay">
                        <h5 class="card-title-0">Women</h5>
                        <h5 class="card-text">SHOP<i class="fas fa-arrow-right"></i></h5>
                    </div>
                </div>
            </a>
            <a href="<?php echo Url::to(['/shoe/mens']) ?>" class="custom-card">
                <div class="col-sm-3 card-1">
                    <img class=""src="/sams/css/images/men.jpg" alt="Card image cap">
                    <div class="card-img-overlay">
                        <h5 class="card-title-0">Men</h5>
                        <h5 class="card-text">SHOP<i class="fas fa-arrow-right"></i></h5>
                    </div>
                </div>
            </a>
            <a href="<?php echo Url::to(['/shoe/kids']) ?>" class="custom-card">
                <div class="col-sm-3 card-1">
                    <img class=""src="/sams/css/images/kids.jpg" alt="Card image cap">
                    <div class="card-img-overlay">
                        <h5 class="card-title-0">Kids</h5>
                        <h5 class="card-text">SHOP<i class="fas fa-arrow-right"></i></h5>
                    </div>
                </div>
            </a>
            <a href="<?php echo Url::to(['/shoe/accessories']) ?>" class="custom-card">
                <div class="col-sm-3 card-1">
                    <img class=""src="/sams/css/images/accessories.jpg" alt="Card image cap">
                    <div class="card-img-overlay">
                        <h5 class="card-title-0">Accessories</h5>
                        <h5 class="card-text">SHOP<i class="fas fa-arrow-right"></i></h5>
                    </div>
                </div>
            </a>
                
            </div>
    </div>

    
    <div class="newreleases">
        <h2 class="hed-2"> New Releases</h2>
        <div class="scrolling-wrapper">
            <?php echo \yii\widgets\ListView::widget([
    'dataProvider' => $dataProvider,
    'pager' => [
        'class' => \yii\bootstrap4\LinkPager::class,
    ],
    'itemView' => '_shoe_item',
    'layout' => '<div class="col-sm-12 d-flex flex-wrap">{items}</div>{pager}',
    'itemOptions' => [
        'tag' => false
    ]
]) ?>                                                             
        </div>
    </div>
        
    <div class="newreleases">
        <h2 class="hed-2"> Top picks</h2>
        <div class="scrolling-wrapper">
            <?php echo \yii\widgets\ListView::widget([
    'dataProvider' => $dataProvider,
    'pager' => [
        'class' => \yii\bootstrap4\LinkPager::class,
    ],
    'itemView' => '_shoe_item',
    'layout' => '<div class="col-sm-12 d-flex flex-wrap">{items}</div>{pager}',
    'itemOptions' => [
        'tag' => false
    ]
]) ?>                                                                               
        </div>
    </div> 
     <div class="container">
        <div class="mail-list">
        	<h2 class="hed-2">Never miss  a drop</h2>
        	<p class="par-1">Receive updates about new<br>products and promotion</p>
        	<a href="/sams/mail/create" class="btn btn-outline-dark">JOIN MAILING lIST</a>
        	
        </div>     
     </div>

</div>
