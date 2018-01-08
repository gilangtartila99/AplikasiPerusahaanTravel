<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\PesanMobil */
/* @var $form yii\widgets\ActiveForm */
?>
<style type="text/css">
.background {
    background-color: #DAD7FE;
    padding-right: 3%;
    padding-top: 3%;
    padding-bottom: 3%;
    padding-left: 3%;
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
.bawah {
    padding-bottom: 10%;
    margin-bottom: 7%;
}
</style>

<div class="background col-lg-6">
    <?php $form = ActiveForm::begin(['id' => 'my-form-id']); ?>

<?php
    $model->tanggal_mulai = date('Y-m-d');
    $model->jumlah_hari = 1;
    $model->tanggal_akhir = date('Y-m-d' , strtotime($model->tanggal_mulai) + $model->jumlah_hari * 60 * 60 * 24);
    $checkin = Html::getInputId($model, 'tanggal_mulai');
    $malam = Html::getInputId($model, 'jumlah_hari');
    $checkout = Html::getInputId($model, 'tanggal_akhir');
    $fasilitas = Html::getInputId($model, 'fasilitas');
?>
    <?= $form->field($model, 'tanggal_pesan')->textInput(['readonly' => true]) ?>

    <p>
        <div class="col-lg-4">
        <label>Tanggal Masuk</label>
        <?= DatePicker::widget([
            'model' => $model,
            'attribute' => 'tanggal_mulai',
            'template' => '{addon}{input}',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd',
                    'startDate' => 'Y-m-d',
                ]
        ]);?>
        </div

        <br>

        <?php $data = 
         ['1' => '1 Malam',
         '2' => '2 Malam',
         '3' => '3 Malam',
         '4' => '4 Malam',
         '5' => '5 Malam',
         '6' => '6 Malam',
         '7' => '7 Malam',
         '8' => '8 Malam',
         '9' => '9 Malam',
         '10' => '10 Malam',
         '11' => '11 Malam',
         '12' => '12 Malam',
         '13' => '13 Malam',
         '14' => '14 Malam',
         '15' => '15 Malam']; ?>
        <div class="col-lg-4">
            <?= $form->field($model, 'jumlah_hari')->dropDownList($data, ['prompt'=>'Jumlah Hari','class' => 'textbox', 'onchange' => 'if($(this).val() >= 3) {$("#'.Html::getInputId($model, 'fasilitas').'").val("Laundry");$("#'.Html::getInputId($model, 'fasilitas').'").show();$("#label").show();} else {$("#'.Html::getInputId($model, 'fasilitas').'").val("");$("#'.Html::getInputId($model, 'fasilitas').'").hide();$("#label").hide();}']); ?>
        </div>

<?php
$js = <<<JS
$("#my-form-id #{$checkin}, #{$malam}").on("change", function (e) {
    var checkin = new Date($("#my-form-id #{$checkin}").val());
    var malam = parseInt($("#my-form-id #{$malam}").val());
    var date = checkin.setDate(checkin.getDate()+malam);
    var month = ["01", "02", "03", "04", "05", "06","07", "08", "09", "10", "11", "12"][checkin.getMonth()];
    $("#my-form-id #{$checkout}").val(checkin.getFullYear()+"-"+month+"-"+checkin.getDate())
});
$("#{$fasilitas}").hide();
$("#label").hide();
JS;
$this->registerJs($js);
?>  

        <div class="col-lg-4">
            <?= $form->field($model, 'tanggal_akhir')->textInput(['readonly' => true]) ?>
        </div>
    </p>

    <div class="bawah"></div>

    <label id="label" name="label">Fasilitas</label>
    <?= $form->field($model, 'fasilitas')->textInput(['readonly' => true])->label(false) ?>

    <?php if(Yii::$app->user->getIsGuest()) { ?>
        <?= $form->field($model, 'nama')->textInput(['class' => 'textbox']) ?>

        <?= $form->field($model, 'no_identitas')->textInput(['class' => 'textbox']) ?>

        <?php $data = 
             ['Laki - Laki' => 'Laki - Laki',
             'Perempuan' => 'Perempuan',]; ?>
        <?= $form->field($model, 'jenis_kelamin')->dropDownList($data, ['prompt'=>'Pilih Jenis Kelamin','class' => 'textbox']); ?>

        <?= $form->field($model, 'alamat')->textArea(['class' => 'textbox', 'rows' => 6]) ?>
    <?php } else { echo ''; } ?>


    <div class="form-group">
        <center><?= Html::submitButton($model->isNewRecord ? 'Pesan Sekarang' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?></center>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<div class="col-lg-6">
    <?= DetailView::widget([
        'model' => $paket,
        'attributes' => [
            //'id_mobil',
            [
                'label' => 'Gambar',
                'value' => Html::img("uploads/paket/".$paket->gambar, ['width' => '200px']),
                'format' => 'raw'
            ],
            [
                'label' => 'Nama Villa',
                'value' => $paket->villa->nama_villa,
            ],
            [
                'label' => 'Nama Mobil',
                'value' => $paket->mobil->pabrikan_mobil."".$paket->mobil->jenis_mobil,
            ],
            'nama_paket',
            'keterangan',
            [
                'label' => 'Harga',
                'value' => Yii::$app->formatter->asCurrency($paket->harga),
            ],
        ],
    ]) ?>
</div>
