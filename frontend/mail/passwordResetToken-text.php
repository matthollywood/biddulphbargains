<?php

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);
?>
Hello <?= $user->username ?>,

It looks like you've misplaced your password. Not to worry!

It's really easy to reset,
just follow the link below to reset your password:

<?= $resetLink ?>
