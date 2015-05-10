<?php
/* @var $this yii\web\View */

$this->title = '' . Yii::$app->user->identity->username .''"'s Profile";
use yii\helpers\Html;
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Welcome to your profile!</h1>

        <p class="lead">Use the options below to manage your accounts.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Your Offers</h2>

                <p>Add an offer</p>
				
				<p>View your offers</p>

                <p><a class="btn btn-default" Html::a('click here', ['site/signup'])?>View your offers &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Your Details</h2>

                <p>Your Details</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Payment Information</h2>

                <p>Payment Information</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
