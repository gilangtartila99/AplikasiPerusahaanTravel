<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title>CV Sukarai Tour and Travel</title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<header id="home">
    <div class="main-nav">
      <div class="container">
        <div class="navbar-header">
        <?php if(Yii::$app->user->getIsGuest()) { ?>
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/travel">
            <h1><img class="img-responsive" src="images/sukarai.png" alt="logo"></h1>
          </a>                    
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">                 
            <li class="scroll active"><?= Html::a('Home', ['site/index']) ?></li>
            <li class="scroll"><a href="#services">Pelayanan</a></li>                    
            <li class="scroll"><a href="#portfolio">Mobil</a></li>
            <li class="scroll"><a href="#team">Villa</a></li>
            <li class="scroll"><a href="#blog">Paket</a></li>
            <li class="scroll"><a href="#contact">Hubungi Kami</a></li>
            <li class="scroll"><?= Html::a('Signup', ['users/createuser']) ?></li>
            <li class="scroll"><?= Html::a('Login', ['site/login']) ?></li>
          </ul>
        </div>
        <?php } else { if(Yii::$app->user->identity->role == 1) { ?>
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/travel">
            <h1><img class="img-responsive" src="images/sukarai.png" alt="logo"></h1>
          </a>                    
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">                 
            <li class="scroll active"><?= Html::a('Home', ['site/index']) ?></li>
            <li class="scroll"><?= Html::a('Users', ['users/index']) ?></li>
            <li class="scroll"><?= Html::a('Mobil', ['mobil/index']) ?></li>
            <li class="scroll"><?= Html::a('Villa', ['villa/index']) ?></li>
            <li class="scroll"><?= Html::a('Paket', ['paket/index']) ?></li>
            <li class="scroll"><?= Html::a('Pesan Mobil', ['pesan-mobil/index']) ?></li>
            <li class="scroll"><?= Html::a('Pesan Villa', ['pesan-villa/index']) ?></li>
            <li class="scroll"><?= Html::a('Pesan Paket', ['pesan-paket/index']) ?></li>
            <li class="scroll"><?= Html::a('Logout', ['site/logout']) ?></li> 
          </ul>
        </div>
        <?php } elseif(Yii::$app->user->identity->role == 3) { ?>
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/travel">
            <h1><img class="img-responsive" src="images/sukarai.png" alt="logo"></h1>
          </a>                    
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">                 
            <li class="scroll active"><?= Html::a('Home', ['site/index']) ?></li>
            <li class="scroll"><?= Html::a('Laporan', ['site/manager']) ?></li>
            <li class="scroll"><?= Html::a('Logout', ['site/logout']) ?></li> 
          </ul>
        </div>
        <?php } else { ?>
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/travel">
            <h1><img class="img-responsive" src="images/sukarai.png" alt="logo"></h1>
          </a>                    
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">                 
            <li class="scroll active"><?= Html::a('Home', ['site/index']) ?></li>   
            <li class="scroll"><?= Html::a('Mobil', ['site/allmobil']) ?></li>
            <li class="scroll"><?= Html::a('Villa', ['site/allvilla']) ?></li>
            <li class="scroll"><?= Html::a('Paket', ['site/allpaket']) ?></li>
            <li class="scroll"><?= Html::a('Logout', ['site/logout']) ?></li>
          </ul>
        </div>
        <?php } } ?>
      </div>
    </div><!--/#main-nav-->
</header>
    
    <?= Alert::widget() ?>
    <?= $content ?>

<footer id="footer">
    <div class="footer-top wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
        <div class="container text-center">
            <div class="footer-logo">
                <a href="/travel"><img class="img-responsive" src="images/sukarai.png" alt=""></a>
            </div>
            <div class="social-icons">
                <ul>
                    <li><a class="envelope" href="#"><i class="fa fa-envelope"></i></a></li>
                    <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li> 
                    <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
                    <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a class="tumblr" href="#"><i class="fa fa-tumblr-square"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <p>&copy; <?= date('Y') ?> CV Sukarai Tour and Travel</p>
                </div>
                <div class="col-sm-6">
                    <p class="pull-right">Designed by <a href="https://github.com/gilangtartila99/">Orlando</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
