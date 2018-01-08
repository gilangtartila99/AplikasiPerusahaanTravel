<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PaketSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pakets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Buat Paket', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'label' => 'Villa',
                'value' => function($model) {
                    return $model->villa->nama_villa;
                }
            ],
            [
                'label' => 'Mobil',
                'value' => function($model) {
                    return $model->mobil->pabrikan_mobil . ' ' . $model->mobil->tipe_mobil;
                }
            ],
            'nama_paket',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
