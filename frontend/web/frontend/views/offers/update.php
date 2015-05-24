<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblOffers */

$this->title = 'Update Tbl Offers: ' . ' ' . $model->offer_id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Offers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->offer_id, 'url' => ['view', 'id' => $model->offer_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-offers-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
