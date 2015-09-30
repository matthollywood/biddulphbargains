<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;
use frontend\assets\NewAsset;
use yii\helpers\Url;
use yii\helpers\BaseUrl;



/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php
    $host = Url::base();
    ?>
    <?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'BiddulphBargains',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            $menuItems = [
                ['label' => 'Home', 'url' => ['/site/index']],
				        ['label' => 'Events', 'url' => ['site/events']],
				        ['label' => 'Search', 'url' => ['/site/search']],
                ['label' => 'Contact', 'url' => ['/site/contact']],


            ];
            if (Yii::$app->user->isGuest) {
                    $menuItems[] = ['label' => 'Login/Signup', 'url' => 'http://profile.biddulphbargains.co.uk'];

            } else {
				    $menuItems[] = ['label' => 'Add your offer', 'url' => 'http://profile.biddulphbargains.co.uk/offers/create'];
				    $menuItems[] = ['label' => 'View Your Offers', 'url' => 'http://profile.biddulphbargains.co.uk/offers/index'];
				    $menuItems[] = ['label' => 'Profile', 'url' => 'http://profile.biddulphbargains.co.uk/'];
            $menuItems[] = [
                    'label' => 'Logout ' . Yii::$app->user->identity->username . '',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];

            }

            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
            NavBar::end();
        ?>

        <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
        </div>
    </div>
    <footer class="footer">
        <div class="container">
        <p>&copy; Designed, created and owned by BiddulphBargains.<?= date('Y') ?>   <?= Html::a('Click here', ['site/termsandconditions'])?> for terms and conditions.</p>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
