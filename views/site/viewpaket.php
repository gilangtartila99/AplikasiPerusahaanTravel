<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Paket */

$this->title = $model->nama_paket;
$this->params['breadcrumbs'][] = ['label' => 'Paket', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_paket',
            [
                'label' => 'Gambar',
                'value' => Html::img("uploads/paket/".$model->gambar, ['width' => '200px']),
                'format' => 'raw'
            ],
            [
                'label' => 'Nama Villa',
                'value' => $model->villa->nama_villa,
            ],
            [
                'label' => 'Nama Mobil',
                'value' => $model->mobil->pabrikan_mobil."".$model->mobil->jenis_mobil,
            ],
            'nama_paket',
            'keterangan',
            [
                'label' => 'Harga',
                'value' => Yii::$app->formatter->asCurrency($model->harga),
            ],
        ],
    ]) ?>

</div>
