<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Paket */

$this->title = $model->nama_paket;
$this->params['breadcrumbs'][] = ['label' => 'Pakets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_paket], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_paket], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Anda yakin ingin menghapus ini?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => 'Gambar',
                'value' => Html::img("uploads/paket/".$model->gambar, ['width' => '200px']),
                'format' => 'raw'
            ],
            [
                'label' => 'Villa',
                'value' => $model->villa->nama_villa,
            ],
            [
                'label' => 'Mobil',
                'value' => $model->mobil->pabrikan_mobil . ' ' . $model->mobil->tipe_mobil,
            ],
            'nama_paket',
            'keterangan',
            [
                'label' => 'Harga',
                'value' => Yii::$app->formatter->asCurrency($model->harga),
            ],
        ],
    ]) ?>

</div>
