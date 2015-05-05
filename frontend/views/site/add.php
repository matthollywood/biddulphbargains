<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\IdentityInterface;
use yii\jui\DatePicker;

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
			
			<?= $form->field($model, 'offer_type') ?>
			<?= $form->field($model, 'offer_description')->textArea(['rows' => 6])  ?>
			<?= $form->field($model, 'offer_start_date') ?>
			<?= $form->field($model, 'offer_end_date') ?>
						
			<div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
			</div>
	<?php ActiveForm::end(); ?>
		</div>
	</div>
</div>