<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
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
    <?php
    NavBar::begin();
    echo Nav::widget([
        'items' => [
            ['label' => 'Womens', 'url' => ['/site/womens']],
            ['label' => 'Mens', 'url' => ['/site/mens']],
            ['label' => 'Kids', 'url' => ['/site/kids']],
            ['label' => 'Accessories', 'url' => ['/site/accessories']],
            ['label' => 'Sale', 'url' => ['/site/sales']],
            ['label' => 'Sam\'s Shoes', 'url' => ['/site/index'],'options'=>['class'=>'nav-logo']],
            ['label' =>
                '<form class="form-inline d-flex justify-content-center md-form form-sm">
                <input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Search"
                aria-label="Search">
                <i class="fas fa-search" aria-hidden="true"></i>
                </form>',
            ],
            [
                'label' => '<i class="fas fa-shopping-bag" align="right"></i>',
                'items' => [
                    ['label' => 'My cart', 'url' => '#'],
                    ['label' => 'Check Out', 'url' => '#'],
                ],'options'=>['class'=>'nav-icons-loc']],
            [
                'label' => '<i class="far fa-bell" align="right"></i>',
                'items' => [
                    ['label' => 'notification 1', 'url' => '#'],
                    ['label' => 'notification 2', 'url' => '#'],
                ],'options'=>['class'=>'nav-icons-loc']],
            [
                'label' => '<i class="far fa-user" align="right"></i>',
                'items' => [
                    ['label' => 'Sign up', 'url' => ['/site/signup']],
                    ['label' => 'Login', 'url' => ['/site/login']],
                    ['label' => 'My profile', 'url' => ['/site/profile']],
                    ['label' => 'Logout', 'url' => ['/site/logout'],
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
        <div>
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
