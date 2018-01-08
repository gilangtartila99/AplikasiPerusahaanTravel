<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title = 'Signup';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
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
</style>
<div class="container">
<div class="background">
    <h1 align="center"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
</div>
