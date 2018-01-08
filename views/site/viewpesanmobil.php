<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PesanMobil */

$this->title = $model->id_pesan_mobil;
$this->params['breadcrumbs'][] = ['label' => 'Pesan Mobil', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">

    <h1>No Pemesanan : <?= Html::encode($this->title) ?></h1>
    
    <h3><b>Harga : <?= Yii::$app->formatter->asCurrency($model->mobil->harga) ?></b></h3>

    <p><?= Html::a('Cetak Bukti Pemesanan', ['cetakpesanmobil', 'id' => $model->id_pesan_mobil], ['class' => 'btn btn-primary']) ?></p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [   
                'label' => 'Nomor Pemesanan',
                'value' => $model->id_pesan_mobil,
            ],
            'tanggal_pesan',
            'tanggal_mulai',
            'jumlah_hari',
            'tanggal_akhir',
            [   
                'label' => 'Mobil',
                'value' => $model->mobil->pabrikan_mobil . ' ' . $model->mobil->jenis_mobil,
            ],
            'nama',
            'no_identitas',
            'jenis_kelamin',
            'alamat',
        ],
    ]) ?>

</div>
