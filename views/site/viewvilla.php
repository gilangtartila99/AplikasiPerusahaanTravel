<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Villa */

$this->title = $model->nama_villa;
$this->params['breadcrumbs'][] = ['label' => 'Villa', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_villa',
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
