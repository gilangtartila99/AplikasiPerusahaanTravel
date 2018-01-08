<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PesanMobil */

$this->title = 'Pesan Paket';
$this->params['breadcrumbs'][] = ['label' => 'Pesan Paket', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">

    <h1 align="center"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formpaket', [
        'model' => $model,
        'paket' => $paket,
    ]) ?>

</div>
