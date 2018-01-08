<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MobilSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mobils';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Buat Mobil', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'plat_nomor',
            'tipe_mobil',
            'pabrikan_mobil',
            'jenis_mobil',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
