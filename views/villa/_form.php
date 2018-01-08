<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Villa */
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

<div class="villa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipe_villa')->textInput(['maxlength' => true,'class' => 'textbox']) ?>

    <?= $form->field($model, 'nama_villa')->textInput(['maxlength' => true,'class' => 'textbox']) ?>

    <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true,'class' => 'textbox']) ?>

    <?= $form->field($model, 'harga')->textInput(['class' => 'textbox']) ?>

    <?= $form->field($model, 'gambar')->textInput(['maxlength' => true,'class' => 'textbox']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
