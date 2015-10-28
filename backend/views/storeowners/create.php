<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\StoreOwners */

$this->title = 'Create Store Owners';
$this->params['breadcrumbs'][] = ['label' => 'Store Owners', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="store-owners-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
