<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PaketSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="paket-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_paket') ?>

    <?= $form->field($model, 'villa_id') ?>

    <?= $form->field($model, 'mobil_id') ?>

    <?= $form->field($model, 'nama_paket') ?>

    <?= $form->field($model, 'keterangan') ?>

    <?php // echo $form->field($model, 'harga') ?>

    <?php // echo $form->field($model, 'gambar') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
