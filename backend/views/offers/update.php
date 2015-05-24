<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblOffers */

$this->title = 'Update Offer';
$this->params['breadcrumbs'][] = ['label' => 'Offers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->offer_id, 'url' => ['view', 'id' => $model->offer_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-offers-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
