<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Villa */

$this->title = 'Update Villa: ' . $model->nama_villa;
$this->params['breadcrumbs'][] = ['label' => 'Villas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_villa, 'url' => ['view', 'id' => $model->id_villa]];
$this->params['breadcrumbs'][] = 'Update';
?>
<style type="text/css">
    .background {
        background-color: #DAD7FE;
        padding-right: 3%;
        padding-top: 3%;
        padding-bottom: 3%;
        padding-left: 3%;
        margin-left: 25%;
        margin-right: 20%;
    }
</style>
<div class="container">
<div class="background">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
</div>
