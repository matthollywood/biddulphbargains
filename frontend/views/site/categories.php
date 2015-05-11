<?php
use yii\helpers\Html;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
/* @var $this yii\web\View */
$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-categories">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Select the type of offer you're looking for to display all offers in the area.</p>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
		'pager' => [
        'firstPageLabel' => 'First',
        'lastPageLabel' => 'Last',
		],
        'filterModel' => $searchModel,
		
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'offer_id',
            'offerType.offer_type',
            'offer_description',
            'start_date',
            'end_date',

            
        ],
    ]); ?>
</div>