<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                <?= $form->field($model, 'username') ?>
                <?= $form->field($model, 'email') ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <div class="form-group field-store-name required">
                    <label class="control-label" for="store-name">Store Name</label>
                    <input type="text" id="store-name" class="form-control" name="storename">

                    <p class="help-block help-block-error"></p>
                </div>
                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
            <p> On submitting your application, you will be redirected to the login page. Your account will be activated within 24 hours by our Web Team.</p>
            <p> If your account is not activated within 24 hours please visit our contact page by clicking <?= Html::a('here', 'http://www.biddulphbargains.co.uk/site/contact')?> .</p>
        </div>
    </div>
</div>
