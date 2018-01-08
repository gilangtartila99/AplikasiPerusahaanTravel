<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Mobil */
/* @var $form yii\widgets\ActiveForm */
?>

<style type="text/css">   
    .textbox {
        background-color: #fff;
        width: 100%;
        border-color: #fff;
        padding-right: 1%;
        padding-top: 1%;
        padding-bottom: 1%;
        padding-left: 1%;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
    }
</style>
<div class="mobil-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'plat_nomor')->textInput(['maxlength' => true,'class' => 'textbox']) ?>

    <?= $form->field($model, 'tipe_mobil')->textInput(['maxlength' => true,'class' => 'textbox']) ?>

    <?= $form->field($model, 'pabrikan_mobil')->textInput(['maxlength' => true,'class' => 'textbox']) ?>

    <?= $form->field($model, 'jenis_mobil')->textInput(['maxlength' => true,'class' => 'textbox']) ?>

    <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true,'class' => 'textbox']) ?>

    <?= $form->field($model, 'harga')->textInput(['class' => 'textbox']) ?>

    <?= $form->field($model, 'gambar')->textInput(['maxlength' => true,'class' => 'textbox']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
