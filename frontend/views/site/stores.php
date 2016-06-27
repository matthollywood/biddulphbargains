<?php
use yii\helpers\Html;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
/* @var $this yii\web\View */
$this->title = 'Stores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-stores">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Select the store you're looking for to display all offers of that type in the area.</p>
<?= 
     ListView::widget([
		'dataProvider' => $provider,
		'itemView' => function($model)
	{return'<div class="row">
	<div class="col-md-4">
		<div class="list-group">
			<a href="categorieslanding/'.str_replace(' ','-',$model->store_name).'" class="list-group-item active">
				<h4 class="list-group-item-heading">' .$model->store_name. '</h4>
				<p class="list-group-item-text"></p>
  			</a>
		</div>
	</div>
</div>';
		},
		'layout' => '{items}{pager}',
  ]);
  ?>
</div>
