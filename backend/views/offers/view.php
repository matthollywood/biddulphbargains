<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\TblOfferTypes;
use backend\models\TblStores;
use backend\models\TblOfferStatus;

/* @var $this yii\web\View */
/* @var $model backend\models\TblOffers */
$this->title = 'Your offer';
$this->params['breadcrumbs'][] = ['label' => 'Offers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-offers-view">

    <h1>Your offer details:</h1>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->offer_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->offer_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
		'attributes' => [

            [                      // the offer name of the model
                'label' => 'Offer Type',
                'value' => $model->offerType->offer_type,

                       ],
            'offer_description',
            'offer_start_date',
            'offer_end_date',
            [
              'label' => 'Active Status',
              'value' => $model->offerStatus->offer_status_type,
            ],

        ],
    ]) ?>

</div>
