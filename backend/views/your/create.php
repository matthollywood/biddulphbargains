<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Your */

$this->title = 'Create Your Offer';
$this->params['breadcrumbs'][] = ['label' => 'Update Your Offer', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="your-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
