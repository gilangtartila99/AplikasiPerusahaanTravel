<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PesanPaketSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Laporan Pemesanan Paket';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <p><?= Html::a('Cetak Laporan', ['cetaklaporan'],['class' => 'btn btn-primary']) ?></p>

    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
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

            [
                'class' => 'kartik\grid\ActionColumn',
                'template' => '{view} {delete}',
            ],
        ],
    ]); ?>
</div>
