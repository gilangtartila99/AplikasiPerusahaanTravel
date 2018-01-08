<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PesanVillaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pesan-villa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_pesan_villa') ?>

    <?= $form->field($model, 'tanggal_pesan') ?>

    <?= $form->field($model, 'tanggal_mulai') ?>

    <?= $form->field($model, 'jumlah_hari') ?>

    <?= $form->field($model, 'tanggal_akhir') ?>

    <?php // echo $form->field($model, 'villa_id') ?>

    <?php // echo $form->field($model, 'nama') ?>

    <?php // echo $form->field($model, 'no_identitas') ?>

    <?php // echo $form->field($model, 'jenis_kelamin') ?>

    <?php // echo $form->field($model, 'alamat') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
