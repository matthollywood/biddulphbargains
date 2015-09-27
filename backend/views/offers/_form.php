<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\TblOfferTypes;
use backend\models\TblOfferStatus;
use backend\models\TblStores;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\TblOffers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-offers-form">
    <div class="row">
        <div class="col-sm-5">
             <?php $form = ActiveForm::begin();
             if($userId != 30){
             ?>
             <?= $form->field($model, 'id')
               ->dropDownList(
               ArrayHelper::map(TblStores::find()->where(['user_id' => $userId])->all(),'store_id','store_name')
               );

             }else{
                echo $form->field($model, 'id')
               ->dropDownList(
               ArrayHelper::map(TblStores::find()->all(),'store_id','store_name')
               );
             }
             ?>

             <?= $form->field($model, 'offer_type_id')
               ->dropDownList(
               ArrayHelper::map(TblOfferTypes::find()->all(),'offer_id','offer_type')
               )
             ?>

             <?= $form->field($model, 'offer_description')->textInput(['maxlength' => 8000])->textArea(['rows' => 6]) ?>


             <?= $form->field($model, 'offer_start_date')->widget(DatePicker::className(), [
             'inline' => false,
             // 'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
             'clientOptions' => [
                 'autoclose' => true,
                 'format' => 'yyyy-mm-dd'
             ]
             ]);?>

             <?= $form->field($model, 'offer_end_date')->widget(DatePicker::className(), [
             'inline' => false,
            // 'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
             'clientOptions' => [
                 'autoclose' => true,
                 'format' => 'yyyy-mm-dd'
             ]
             ]);?>

             <?= $form->field($model,'active_status')->dropDownList(
              ArrayHelper::map(TblOfferStatus::find()->all(),'offer_status_type','active_status')
              ) ?>



             <div class="form-group">
                 <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
             </div>

             <?php ActiveForm::end(); ?>

        </div>
    </div>

</div>
