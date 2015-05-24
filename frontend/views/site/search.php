<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
$this->title = 'Search';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
	<div class="site-search row">
	    <div class="col-sm-6">
			<h1><?= Html::encode($this->title) ?></h1>

	    	<h2>Welcome to BiddulphBargains</h2>
			<p>Enter the name of the store or the type of offer you're looking for below to find the latest deals in Biddulph.<br>
			<br>
			<form action="categorieslanding" method="post">
			<div class="form-group">
	        <input type="text" name="keyword" placeholder="Search" class="form-control">
			</div>
			<div class="form-group">
	            <?= Html::submitButton('Search', ['class' => 'btn btn-primary', 'name' => 'submit']) ?>
	        </div>
	        </form>
		</div>
		<div class="col-sm-12">
			Alternatively you can <?= Html::a('click here', ['site/categories'])?> to see the list of offer types</p>
		</div>
		
	</div>
	
</div>
