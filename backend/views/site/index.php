<?php
/* @var $this yii\web\View */

$this->title = 'Your profile';
use yii\helpers\Html;
use yii\helpers\BaseUrl;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Welcome to your profile <?php $form = ActiveForm::begin();
         if($userId != 30){
         ?>
         <?= $form->field($model, 'id')
           ->dropDownList(
           ArrayHelper::map(TblStores::find()->where(['user_id' => $userId])->all(),'store_id','store_name')
           );
           ?><?php ActiveForm::end(); ?>

!</h1>

        <p class="lead">Use the options below to manage your accounts.</p>


    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Your Offers</h2>
                <p>Click the button below to add a new offer</p>
				<p><?= Html::a('Add an Offer &raquo;', ['/offers/create'], ['class' => 'btn btn-primary']) ?></p>
				<br>
				<p>Click the button below to view, edit or remove your current offers</p>
				<p><?= Html::a('Your Offers &raquo;', ['/offers/index'], ['class' => 'btn btn-primary']) ?></p>
            </div>
            <div class="col-lg-4">
                <h2>Your Details</h2>

                <p>For all account enquiries, please email us at: support@biddulphbargains.co.uk</p>

            </div>

        </div>

    </div>
</div>
