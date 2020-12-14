<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\Button;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use frontend\assets\AppAsset;
use frontend\models\OrderedShoes;
use common\widgets\Alert;

AppAsset::register($this);
$cart=OrderedShoes::find()->latest()->count();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
<?php if(Yii::$app->user->can('admin')): ?>
    <?php
    NavBar::begin();
    echo Nav::widget([
        'items' => [
            ['label' => 'Womens', 'url' => ['/shoe/womens']],
            ['label' => 'Mens', 'url' => ['/shoe/mens']],
            ['label' => 'Kids', 'url' => ['/shoe/kids']],
            ['label' => 'Accessories', 'url' => ['/shoe/accessories']],
            ['label' => 'Sale', 'url' => ['/shoe/sales']],
            ['label' => 'Sam\'s Shoes', 'url' => ['site/index'],'options'=>['class'=>'nav-logo']],
            ['label' =>
                '<form class="form-inline d-flex justify-content-center md-form form-sm">
                <input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Search"
                aria-label="Search">
                <i class="fas fa-search" aria-hidden="true"></i>
                </form>'
            ],
            [
                'label' => '<i class="far fa-bell" align="right"></i>',
                'items' => [
                    ['label' => 'notification 1', 'url' => 'site/message'],
                    ['label' => 'notification 2', 'url' => 'site/message'],
                ],'options'=>['class'=>'nav-icons-loc']],
            [
                'label' => '<i class="fas fa-user-cog" align="right"></i>',
                'items' => [
                    ['label' => 'Dashboard', 'url' => ['site/dashboard']],
                    ['label' => 'Orders', 'url' => ['/ordered-shoes/index']],
                    ['label' => 'Inventory', 'url' => ['/shoe/index']],
                    ['label' => 'Add Items', 'url' => ['/shoe/create']],
                    ['label' => 'Logout (' . Yii::$app->user->identity->username . ')', 'url' => ['/site/logout'],
                        'linkOptions'=> [
                            'data-method' => 'post'
                        ]
                    ],
                ],'options'=>['class'=>'nav-icons-loc']],
            
     
        ],
        'options' => ['class' => 'navbar-nav navbar-expand-lg navbar-light bg-light fixed-top','style' => 'display: flex;justify-content: center;float: none;,'],
            'encodeLabels' => false,
     
    ]);
    NavBar::end();
    ?>
<?php else: ?>
   <?php
    NavBar::begin([
        'options' => ['class' => 'navbar-expand-lg navbar-light bg-light shadow-sm fixed-top','style' => 'display:flex; justify-content:center; float:none;,'],
        'innerContainerOptions' => [
            'class' => 'container-fluid'
        ]
    ]);
    $menuItems[] =  ['label' => 'Womens', 'url' => ['/shoe/womens']];
    $menuItems[] = ['label' => 'Mens', 'url' => ['/shoe/mens']];
    $menuItems[] =  ['label' => 'Kids', 'url' => ['/shoe/kids']];
    $menuItems[] = ['label' => 'Accessories', 'url' => ['/shoe/accessories']];
    $menuItems[] = ['label' => 'Sale', 'url' => ['/shoe/sales']];
    $menuItems[] = ['label' => 'Sam\'s Shoes', 'url' => ['/site/index'],'options'=>['class'=>'nav-logo']];
    ?>
 <form action="<?php echo Url::to(['/shoe/search']) ?>" class="form-inline border-dark rounded-pill ml-5">
 <input class="form-control form-control-sm border-dark rounded-pill mr-2 w-85 search-inp" type="text" placeholder="Search"
        name="keyword"
        value="<?php echo Yii::$app->request->get('keyword') ?>"
        aria-label="Search">
   <button class="btn btn-outline-dark btn-sm rounded-pill"><i class="fas fa-search" aria-hidden="true"></i></button>
        
 </form>
<?php
if (Yii::$app->user->isGuest) {
    $menuItems[] = [
                'label' => '<i class="fas fa-shopping-bag"></i>',
                'items' => [
                    ['label' => 'My cart', 'url' => ['/site/login']],
                    ['label' => 'Check Out', 'url' => ['/site/login']],
                ],'options'=>['class'=>'nav-icons-loc']];
} else {
    $menuItems[] = [
        'label' => '<i class="fas fa-shopping-bag"></i>',
        'items' => [
            ['label' => 'My cart', 'url' => ['/ordered-shoes/cart']],
            ['label' => 'Check Out', 'url' => ['/checkout/create']],
        ],'options'=>['class'=>'nav-icons-loc']];
    $menuItems[] = [
                'label' => '<i class="far fa-bell"></i>',
                'items' => [
                    ['label' => 'notification 1', 'url' => '#'],
                    ['label' => 'notification 2', 'url' => '#'],
                ],'options'=>['class'=>'nav-icons-loc']];
}
if (Yii::$app->user->isGuest) {
    $menuItems[] = [
                'label' => '<i class="far fa-user"></i>',
                'items' => [
                    ['label' => 'Sign up', 'url' => ['/site/signup']],
                    ['label' => 'Login', 'url' => ['/site/login']],
                ],'options'=>['class'=>'nav-icons-loc']];
} else {
        $menuItems[] = [
            'label' => '<i class="far fa-user"></i>',
            'items' => [
                ['label' => 'My profile', 'url' => ['/site/profile']],
                ['label' => 'Logout (' . Yii::$app->user->identity->username . ')', 'url' => ['/site/logout'],
                    'linkOptions'=> [
                        'data-method' => 'post'
                    ]
                ],
            ],'options'=>['class'=>'nav-icons-loc']];
    }

echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-expand-lg','style' => 'display:flex; justify-content:center; float:none;,'],
    'items' => $menuItems,
    'encodeLabels' => false,
    
]);
    NavBar::end();
    ?>
 
 <?php endif; ?>
<?php if(Yii::$app->user->can('admin')){?>
	<div class="add-button">
	<?= Html::a('+Add Item', ['/shoe/create'], ['class'=>'btn btn-outline-dark btn-sm rounded-pill add-button-style']) ?>
    </div>
     <?php }?>
        <div class="content-main">
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
</div>

<footer class="footer">
    <div class="row row-1">
        <div class="col-md">
            <h6>MY ACCOUNT</h6>
            <h6> Sign in</h6>
            <h6> Register</h6>
            <h6> Order status</h6>
        </div>
        <div class="col-md">
            <h6>HELP</h6>
            <h6> Shipping</h6>
            <h6>Returns</h6>
            <h6>Sizing</h6>
        </div>
        <div class="col-md">
            <h6>ABOUT</h6>
            <h6> Our Story</h6>
            <h6> Media</h6>
            <h6> Sustainability</h6>
        </div>
        <div class="col-md">
            <h6>LEGAL</h6>
            <h6> Term of use</h6>
            <h6> Term of sale</h6>
            <h6> Privacy policy</h6>
        </div> 
        <div class="col-md">
            <h6>SOCIAL MEDIA</h6>
            <h6><i class="fab fa-facebook"></i></h6>
            <h6><i class="fab fa-twitter"></i></h6>
            <h6><i class="fab fa-instagram"></i></h6>
            <h6><i class="fab fa-linkedin"></i></h6>
        </div> 
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>