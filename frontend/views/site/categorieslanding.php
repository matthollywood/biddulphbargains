<?php
use yii\helpers\Html;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use yii\data\pagination;
use yii\widgets\LinkPager;
/* @var $this yii\web\View */
$this->title = 'Offer Results';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-categorieslanding">
    <h1><?= Html::encode($this->title) ?></h1>
    <hr>
	<?php
	if(count($model) > 0){
		foreach($model as $row){
			?>
			<h2><?= $row['store_name']; ?></h2>
			<h3><?= $row['offer_description']; ?></h3>
      <h4><?= $row['offer_type']; ?></h4>
  		<p>Start Date :<span class="label label-success"><?php echo date("d-m-Y", strtotime($row['offer_start_date'])); ?></span></p>
			<p>End Date&nbsp;&nbsp;:<span class="label label-danger"><?php echo date("d-m-Y", strtotime($row['offer_end_date'])); ?></span></p>
			<hr>
			<?php

		}

	}







else{
		?>
			<p>Oops! Seems like there's no offers like that at the moment. You could try again or check back soon!.</p>
			<p><?= Html::a('Try again', ['site/search'])?></p>
		<?php
	}
	?>

</div>
