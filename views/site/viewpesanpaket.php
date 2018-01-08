<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PesanPaket */

$this->title = $model->id_pesan_paket;
$this->params['breadcrumbs'][] = ['label' => 'Pesan Pakets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">

    <h1>Nomor Pemesanan : <?= Html::encode($this->title) ?></h1>
    
    <h3><b>Harga : <?= Yii::$app->formatter->asCurrency($model->paket->harga) ?></b></h3>

    <p><?= Html::a('Cetak Bukti Pemesanan', ['cetakpesanpaket', 'id' => $model->id_pesan_paket], ['class' => 'btn btn-primary']) ?></p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [   
                'label' => 'Nomor Pemesanan',
                'value' => $model->id_pesan_paket,
            ],
            'tanggal_pesan',
            'tanggal_mulai',
            'jumlah_hari',
            'tanggal_akhir',
            [   
                'label' => 'Mobil',
                'value' => $model->paket->mobil->pabrikan_mobil . ' ' . $model->paket->mobil->jenis_mobil,
            ],
            [   
                'label' => 'Villa',
                'value' => $model->paket->villa->nama_villa,
            ],
            'nama',
            'no_identitas',
            'jenis_kelamin',
            'alamat',
        ],
    ]) ?>

</div>
