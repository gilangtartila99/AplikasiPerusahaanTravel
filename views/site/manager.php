<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PesanMobilSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hasil';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'showPageSummary' => true,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            //'id_pesan_mobil',
            [
                'attribute' => 'id_pesan_mobil',
                'pageSummary' => 'Total Pendapatan',
            ],
            'tanggal_pesan',
            'tanggal_mulai',
            'jumlah_hari',
            'tanggal_akhir',
            'nama',
            'no_identitas',
            'supir',
            [
                'label' => 'Supir',
                'attribute' => 'supir',
                'value' => function($model) {
                    if($model->supir == 'Pakai Supir') {
                        return $model->supir.'   Tambahan Biaya : Rp. 250.000';
                    } else {
                        return $model->supir;
                    }
                },
            ],
            [
                'label' => 'Jumlah',
                'attribute' => 'mobil.harga',
                'value' => function($model) {
                    if($model->supir != 'Pakai Supir') {
                        return $model->mobil->harga;
                    } else {
                        return $model->mobil->harga+250000;
                    }
                },
                'pageSummary' => true,
            ],
        ],
    ]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider2,
        'showPageSummary' => true,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            [
                'label' => 'ID Pesan Paket',
                'attribute' => 'id_pesan_paket',
                'value' => function($model) {
                    return $model->id_pesan_paket;
                },
                'pageSummary' => 'Total',
            ],
            'tanggal_pesan',
            'tanggal_mulai',
            'jumlah_hari',
            'tanggal_akhir',
            // 'paket_id',
            'nama',
            // 'no_identitas',
            // 'jenis_kelamin',
            // 'alamat',
            [
                'label' => 'Jumlah',
                'attribute' => 'paket.harga',
                'value' => function($model) {
                    return $model->paket->harga;
                },
                'pageSummary' => true,
            ],
        ],
    ]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider3,
        //'filterModel' => $searchModel,
        'showPageSummary' => true,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            [
                'label' => 'ID Pesan Villa',
                'attribute' => 'id_pesan_villa',
                'value' => function($model) {
                    return $model->id_pesan_villa;
                },
                'pageSummary' => 'Total',
            ],
            'tanggal_pesan',
            'tanggal_mulai',
            'jumlah_hari',
            'tanggal_akhir',
            // 'villa_id',
            'nama',
            // 'no_identitas',
            // 'jenis_kelamin',
            // 'alamat',
            [
                'label' => 'Jumlah',
                'attribute' => 'villa.harga',
                'value' => function($model) {
                    return $model->villa->harga;
                },
                'pageSummary' => true,
            ],
        ],
    ]); ?>
</div>
