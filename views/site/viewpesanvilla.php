<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PesanVilla */

$this->title = $model->id_pesan_villa;
$this->params['breadcrumbs'][] = ['label' => 'Pesan Villas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">

    <h1>Nomor Pemesanan : <?= Html::encode($this->title) ?></h1>
    
    <h3><b>Harga : <?= Yii::$app->formatter->asCurrency($model->villa->harga) ?></b></h3>

    <p><?= Html::a('Cetak Bukti Pemesanan', ['cetakpesanvilla', 'id' => $model->id_pesan_villa], ['class' => 'btn btn-primary']) ?></p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [   
                'label' => 'Nomor Pemesanan',
                'value' => $model->id_pesan_villa,
            ],
            'tanggal_pesan',
            'tanggal_mulai',
            'jumlah_hari',
            'tanggal_akhir',
            [   
                'label' => 'Villa',
                'value' => $model->villa->nama_villa,
            ],
            'nama',
            'no_identitas',
            'jenis_kelamin',
            'alamat',
        ],
    ]) ?>

</div>
