<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblOffers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-offers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'offer_type_id')->textInput() ?>

    <?= $form->field($model, 'offer_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'offer_start_date')->textInput() ?>

    <?= $form->field($model, 'offer_end_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
