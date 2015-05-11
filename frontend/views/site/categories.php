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
        'dataProvider' => $provider,
    ]); ?>
</div>