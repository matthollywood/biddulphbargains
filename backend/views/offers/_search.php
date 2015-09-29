<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblOffersSearch */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="tbl-offers-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'offer_id') ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'offer_type_id') ?>

    <?= $form->field($model, 'offer_description') ?>

    <?= $form->field($model, 'offer_start_date') ?>

    <?= $form->field($model, 'active_status') ?>

    <?php // echo $form->field($model, 'offer_end_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
