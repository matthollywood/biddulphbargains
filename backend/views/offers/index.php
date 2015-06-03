<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblOffersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Your Offers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-offers-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Offers', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
			
            'offer_id',
			[
				'attribute'=>'offer_type_id',
				'value'=>'offerType.offer_type',
			],
            'offer_description',
            'offer_start_date',
            'offer_end_date',
			
		
            ['class' => 'yii\grid\ActionColumn'],
			
			
        ],
    ]); ?>

</div>
