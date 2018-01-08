<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PesanVillaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pesan Villa';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <p><?= Html::a('Cetak Laporan', ['cetaklaporan'],['class' => 'btn btn-primary']) ?></p>

    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
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

            [
                'class' => 'kartik\grid\ActionColumn',
                'template' => '{view} {delete}',
            ],
        ],
    ]); ?>
</div>
