<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblOffers */

$this->title = 'Create Offers';
$this->params['breadcrumbs'][] = ['label' => 'Offers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-offers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'userId' => $userId,
        'userRole' => $userRole,
    ]) ?>

</div>
