<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Your */

$this->title = 'Update Your Offer';
$this->params['breadcrumbs'][] = ['label' => 'Your Offers', 'url' => ['index']];

$this->params['breadcrumbs'][] = 'Update Your Offer';
?>
<div class="your-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
