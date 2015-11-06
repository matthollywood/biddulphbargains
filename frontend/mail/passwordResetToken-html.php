<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);
?>
<div class="password-reset">

  <html>
<body>
  <a href="http://www.BiddulphBargains.co.uk">
  <img src="http://www.biddulphbargains.co.uk/css/images/original-logos-2015-Jun-8625-5800746" alt="BiddulphBargains" width = "700" height "231" align="middle">
</a>
    <p align="middle">Hello <?= Html::encode($user->username) ?>,</p>
    <br>
    <p align="middle">It looks like you've misplaced your password. Not to worry!</P>
        <br>
    <p align="middle">It's really easy to reset,<p>
    <p align="middle">just follow the link below to reset your password:</p>
      <br>
    <p align="middle"><?= Html::a(Html::encode($resetLink), $resetLink) ?></p>

  </body>
  </html>
</div>
