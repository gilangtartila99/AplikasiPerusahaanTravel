<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Villa */

$this->title = $model->nama_villa;
$this->params['breadcrumbs'][] = ['label' => 'Villas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_villa], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_villa], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => 'Gambar',
                'value' => Html::img("uploads/villa/".$model->gambar, ['width' => '200px']),
                'format' => 'raw'
            ],
            'tipe_villa',
            'nama_villa',
            'keterangan',
            [
                'label' => 'Harga',
                'value' => Yii::$app->formatter->asCurrency($model->harga),
            ],
        ],
    ]) ?>

</div>
