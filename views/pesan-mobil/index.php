<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PesanMobilSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pesan Mobils';
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

            [
                'class' => 'kartik\grid\ActionColumn',
                'template' => '{view} {delete}',
            ],
        ],
    ]); ?>
</div>
