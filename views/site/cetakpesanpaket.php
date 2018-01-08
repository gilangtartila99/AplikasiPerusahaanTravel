<?php 
use yii\helpers\Html;
?>
<p><b><h3 align="center">CV. Sukarai Tour and Travel</h3></b></p>
<p align="center">Ini adalah bukti pemesanan anda!</p>
<p></p>
<p></p>
<p></p>
<p></p> 
<?php
//var_dump($dataProvider);

$kode = $model->id_pesan_paket;
$paket = $model->paket['nama_paket'];
$checkin = $model->tanggal_mulai;
$checkout = $model->tanggal_akhir;
$malam = $model->jumlah_hari. ' Malam';
$harga = Yii::$app->formatter->asCurrency($model->paket['harga']*$model->jumlah_hari);
$nama = $model->nama;
//$status = $model->STATUS;
$no = $model->no_identitas;
$alamat = $model->alamat;
//$telp = $model->NO_TELP;
//$email = $model->EMAIL;
$gambarhotel = $model->paket['gambar'];

?>

<table class="table table-striped" border="3" width="100%">
  <thead>
    <tr class="table">
      <th>Kode Pemesanan</th>
      <th><?= $kode ?></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th><?= Html::img("uploads/mobil/".$model->paket['gambar'], ['width' => '100px']) ?></th>
      <td>
        <p><b><?= $paket ?></b></p>
        <p>Mulai : <?= Yii::$app->formatter->asDate($checkin, 'd MMMM Y') ?></p>
        <p>Akhir : <?= Yii::$app->formatter->asDate($checkout, 'd MMMM Y') ?></p>
        <p>-----------------------------------------------------------------------------------</p>
      </td>
    </tr>
  </tbody>
</table>

<table class="table table-sm" border="3" width="100%">
  <thead>
    <tr class="table">
      <th>No Identitas</th>
      <th>Nama</th>
      <th>Jumlah Hari</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><?= $no ?></th>
      <td><?= $nama ?></td>
      <td><?= $malam?></td>
    </tr>
    <tr class="table">
      <td></td>
      <th>Total :</th>
      <th><?= $harga?></th>
    </tr>
  </tbody>
</table>
<p><i>*NB : </i></p>
<p><i>-Simpan Kode Pemesanan untuk melakukan Cek Pesanan</i></p>

