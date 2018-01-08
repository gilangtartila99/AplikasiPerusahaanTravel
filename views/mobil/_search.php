<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MobilSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mobil-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_mobil') ?>

    <?= $form->field($model, 'plat_nomor') ?>

    <?= $form->field($model, 'tipe_mobil') ?>

    <?= $form->field($model, 'pabrikan_mobil') ?>

    <?= $form->field($model, 'jenis_mobil') ?>

    <?php // echo $form->field($model, 'keterangan') ?>

    <?php // echo $form->field($model, 'harga') ?>

    <?php // echo $form->field($model, 'gambar') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
