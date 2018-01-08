<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PesanVillaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Laporan Pemesanan Villa';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_pesan_villa',
            'tanggal_pesan',
            'tanggal_mulai',
            'jumlah_hari',
            'tanggal_akhir',
            'villa_id',
            'nama',
            'no_identitas',
            // 'jenis_kelamin',
            // 'alamat',
        ],
    ]); ?>
</div>
