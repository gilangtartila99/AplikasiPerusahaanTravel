<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Mobil */

$this->title = $model->tipe_mobil;
$this->params['breadcrumbs'][] = ['label' => 'Mobils', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_mobil], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_mobil], [
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
