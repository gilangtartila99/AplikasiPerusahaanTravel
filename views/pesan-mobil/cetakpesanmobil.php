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

$total=0;
foreach ($models as $x) {
  	$kode = $x->id_pesan_mobil;
  	$mobil = $x->mobil['pabrikan_mobil'] . ' - ' . $x->mobil['tipe_mobil'];
    $checkin = $x->tanggal_mulai;
    $checkout = $x->tanggal_akhir;
	  $malam = $x->jumlah_hari. ' Malam';
    $harga = Yii::$app->formatter->asCurrency($x->mobil->harga*$x->jumlah_hari);
    $nama = $x->nama;
    //$status = $x->STATUS;
    $no = $x->no_identitas;
    $alamat = $x->alamat;
    //$telp = $x->NO_TELP;
    //$email = $x->EMAIL;
    $gambarhotel = $x->mobil['gambar'];
}

?>

<table class="table table-sm">
  <thead>
    <tr>
      <th>Kode Pemesanan</th>
      <th><?= $kode ?></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th><?= Html::img("uploads/mobil/".$model->mobil['gambar'], ['width' => '100px']) ?></th>
      <td>
        <p><b><?= $mobil ?></b></p>
        <p>Mulai : <?= Yii::$app->formatter->asDate($checkin, 'dd MMMM Y') ?></p>
        <p>Check-out : <?= Yii::$app->formatter->asDate($checkout, 'dd MMMM Y') ?></p>
        <p>-----------------------------------------------------------------------------------</p>
      </td>
    </tr>
  </tbody>
</table>

<table class="table table-sm">
  <thead>
    <tr>
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
    <tr>
      <td></td>
      <th>Total :</th>
      <th><?= $harga?></th>
    </tr>
  </tbody>
</table>
<p><i>*NB : </i></p>
<p><i>-Simpan Kode Pemesanan untuk melakukan Cek Pesanan</i></p>

