<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
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
<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['class' => 'textbox']) ?>

    <?= $form->field($model, 'password')->passwordInput(['class' => 'textbox']) ?>

    <?= $form->field($model, 'nama')->textInput(['class' => 'textbox']) ?>

    <?= $form->field($model, 'no_identitas')->textInput(['class' => 'textbox']) ?>

    <?php $data = 
         ['Laki - Laki' => 'Laki - Laki',
         'Perempuan' => 'Perempuan',]; ?>
    <?= $form->field($model, 'jenis_kelamin')->dropDownList($data, ['prompt'=>'Pilih Jenis Kelamin','class' => 'textbox']); ?>

    <?= $form->field($model, 'alamat')->textArea(['class' => 'textbox', 'rows' => 6]) ?>

    <div class="form-group">
        <center><?= Html::submitButton($model->isNewRecord ? 'Signup' : 'Edit', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?></center>
    </div>

    <?php ActiveForm::end(); ?>

</div>
