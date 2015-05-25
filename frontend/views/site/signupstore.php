<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

$this->title = 'Enter Your Store Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-stores-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'store_name')->textInput(['maxlength' => 50]) ?>

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>