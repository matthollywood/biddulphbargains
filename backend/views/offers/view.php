<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TblOffers */
$this->title = $model->offer_id;
$this->params['breadcrumbs'][] = ['label' => 'Offers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-offers-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php
    $userId = \Yii::$app->user->identity->status;
    if($userId === 30 ){
    ?>
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
    <?php } ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [                      // the owner name of the model
                'label' => 'Shop ID',
                'value' => 'storeName.store_name'
            ],
            [                      // the owner name of the model
                'label' => 'Offer Type',
                'value' => $model->offerType->offer_type,
            ],
            'offer_description',
            'offer_start_date',
            'offer_end_date',
        ],
    ]) ?>

</div>
