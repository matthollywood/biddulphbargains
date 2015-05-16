<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\TblOfferTypes;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\Your */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="your-form">
	<div class = row>
		<div class="col-lg-5">
    <?php $form = ActiveForm::begin(['enableAjaxValidation'=>true]); ?>

        <?php $form = ActiveForm::begin();?>
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
            'format' => 'y-m-d'
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

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
</div>
</div>
