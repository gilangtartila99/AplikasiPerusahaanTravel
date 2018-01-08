<?php

use yii\helpers\Html;
?>
<div class="col-lg-4">
  <div class="team-member wow flipInY" data-wow-duration="1000ms" data-wow-delay="300ms">
    <div class="member-image">
      <center><img class="img-responsive" src="uploads/mobil/<?= $model->gambar ?>" alt=""></center>
    </div>
    <div class="member-info">
      <h3><?= $model->pabrikan_mobil." ".$model->jenis_mobil ?></h3>
      <h4><?= Yii::$app->formatter->asCurrency($model->harga) ?></h4>
      <p><?= $model->plat_nomor ?></p>
    </div>
    <div class="social-icons">
      <?= Html::a('Lihat', ['viewmobil', 'id' => $model->id_mobil], ['class' => 'btn btn-primary']) ?>
      <?= Html::a('Pesan Sekarang', ['pesanmobil', 'id' => $model->id_mobil], ['class' => 'btn btn-danger']) ?>
    </div>
  </div>
</div>