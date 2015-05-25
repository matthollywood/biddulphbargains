<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\TblOffers;
use backend\models\TblOfferTypes;
use dosamigos\datepicker\DatePicker;


/* @var $this yii\web\View */
/* @var $model app\models\TblOffers */
/* @var $form ActiveForm */
$this->title = 'Add your offer';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="addOffer">
	<div class = row>
		<div class="col-lg-5">
    <?php $form = ActiveForm::begin();?>
			<?= $form->field($model, 'offer_type_id')
					  ->dropDownList(
					  ArrayHelper::map(TblOfferTypes::find()->all(),'offer_id','offer_type')
					  )
						?>
			<?= $form->field($model, 'offer_description')->textArea(['rows' => 6])  ?>
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
						
			<div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
			</div>
	<?php ActiveForm::end(); ?>
		</div>
	</div>
</div>