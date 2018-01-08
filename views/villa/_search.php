<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VillaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="villa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_villa') ?>

    <?= $form->field($model, 'tipe_villa') ?>

    <?= $form->field($model, 'nama_villa') ?>

    <?= $form->field($model, 'keterangan') ?>

    <?= $form->field($model, 'harga') ?>

    <?php // echo $form->field($model, 'gambar') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
