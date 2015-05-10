<?php
/* @var $this yii\web\View */

$this->title = 'Your profile';
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

                <p>Click the button below to add a new offer</p>
				<p><?= Html::a('Add an Offer &raquo;', ['/site/add'], ['class' => 'btn btn-primary']) ?></p>
				<br>
				<p>View your offers</p>
				<p>Click the button below to view, edit or remove your current offers</p>
				<p><?= Html::a('Your Offers &raquo;', ['/your/index'], ['class' => 'btn btn-primary']) ?></p>
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
