<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Your */

$this->title = 'Your Offers';
$this->params['breadcrumbs'][] = ['label' => 'Your Offers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="your-view">

    <h1><?= Html::encode($this->title) ?></h1>

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
            'offer_id',
            'offer_type_id',
            'offer_description',
            'offer_start_date',
            'offer_end_date',
        ],
    ]) ?>

</div>
