<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\TblStatus;

/* @var $this yii\web\View */
/* @var $model backend\models\StoreOwners */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="store-owners-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')
               ->dropDownList(
               ArrayHelper::map(TblStatus::find()->all(),'status','status')
			   );
			   ?>



    <div style="display:none;">
    <?= $form->field($model, 'auth_key')->textInput(['maxlength' => true,'style'=>'display:none;']) ?>

    <?= $form->field($model, 'password_hash')->textInput(['maxlength' => true,'style'=>'display:none;']) ?>

    <?= $form->field($model, 'password_reset_token')->textInput(['maxlength' => true,'style'=>'display:none;']) ?>


    <?= $form->field($model, 'created_at')->textInput(['style'=>'display:none;']) ?>

    <?= $form->field($model, 'updated_at')->textInput(['style'=>'display:none;']) ?>
    </div>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
