<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<style type="text/css">
    .background {
        background-color: #DAD7FE;
        padding-right: 3%;
        padding-top: 3%;
        padding-bottom: 3%;
        padding-left: 3%;
        margin-left: 25%;
        margin-right: 20%;
    }
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
<div class="container">
    <div class="background thumbnail">
    <h1 align="center"><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to login:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
    ]); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'class' => 'textbox']) ?>

        <?= $form->field($model, 'password')->passwordInput(['class' => 'textbox']) ?>

        <?= $form->field($model, 'rememberMe')->checkbox() ?>

        <p>Anda tidak memiliki akun? <?= Html::a('Buat akun disini!', ['users/createuser']) ?></p>

        <div class="form-group">
            <center>
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                <?= Html::a('Signup', ['users/create'], ['class' => 'btn btn-danger']) ?>
            </center>
        </div>

    <?php ActiveForm::end(); ?>
    </div>
</div>
