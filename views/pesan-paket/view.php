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

    <p>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_pesan_paket], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'tanggal_pesan',
            'tanggal_mulai',
            'jumlah_hari',
            'tanggal_akhir',
            'paket_id',
            'nama',
            'no_identitas',
            'jenis_kelamin',
            'alamat',
        ],
    ]) ?>

</div>
