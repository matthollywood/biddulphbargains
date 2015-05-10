<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'Search';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-search">
    <h1><?= Html::encode($this->title) ?></h1>

    <h2>Welcome to BiddulphBargains</h2>
	<div>
		<p>Enter the name of the store or the type of offer you're looking for below to find the latest deals in Biddulph.<br>
		<br>
		Alternatively you can <?= Html::a('click here', ['site/categories'])?> to see the list of offer types</p>
	</div>
</div>