<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Mobil */

$this->title = $model->pabrikan_mobil."".$model->jenis_mobil;
$this->params['breadcrumbs'][] = ['label' => 'Mobil', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_mobil',
            [
                'label' => 'Gambar',
                'value' => Html::img("uploads/mobil/".$model->gambar, ['width' => '200px']),
                'format' => 'raw'
            ],
            'plat_nomor',
            'tipe_mobil',
            'pabrikan_mobil',
            'jenis_mobil',
            'keterangan',
            [
                'label' => 'Harga',
                'value' => Yii::$app->formatter->asCurrency($model->harga),
            ],
        ],
    ]) ?>

</div>
