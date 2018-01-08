<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Villa;
use app\models\Mobil;

/* @var $this yii\web\View */
/* @var $model app\models\Paket */
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

<div class="paket-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'villa_id')->dropDownList(ArrayHelper::map(Villa::find()->all(),'id_villa','nama_villa'),['prompt'=>'Pilih Villa'],['class' => 'textbox']) ?>

    <?= $form->field($model, 'mobil_id')->dropDownList(ArrayHelper::map(Mobil::find()->all(),'id_mobil','nama_mobil'),['prompt'=>'Pilih Mobil'],['class' => 'textbox']) ?>

    <?= $form->field($model, 'nama_paket')->textInput(['maxlength' => true,'class' => 'textbox']) ?>

    <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true,'class' => 'textbox']) ?>

    <?= $form->field($model, 'harga')->textInput(['class' => 'textbox']) ?>

    <?= $form->field($model, 'gambar')->textInput(['maxlength' => true,'class' => 'textbox']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
