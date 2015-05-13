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

    <p>Select the type of offer you're looking for to display all offers of that type in the area.</p>

    <?= ListView::widget([
        'dataProvider' => $provider,
		'itemView' => function($model)
		
		{
			$summary = null
			return'<div class="row">
	<div class="col-md-4">
		<div class="list-group">
			<a href="#" class="list-group-item active">
			<h4 class="list-group-item-heading">' .$model->offer_type. '</h4>
		<p class="list-group-item-text"></p>
  </a>
		</div>
	</div>
</div>';
		}
    ]); ?>
</div>