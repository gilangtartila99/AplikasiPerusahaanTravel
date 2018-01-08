<?php

use yii\helpers\Html;
?>
<style type="text/css">
.marginku {
  padding-top: 2%;
  padding-bottom: 2%;
}
</style>
<div class="col-lg-4 marginku">
  <div class="team-member wow flipInY" data-wow-duration="1000ms" data-wow-delay="300ms">
    <div class="member-image">
      <center><img class="img-responsive" src="uploads/villa/<?= $model->gambar ?>" alt=""></center>
    </div>
    <div class="member-info">
      <h3><?= $model->nama_villa ?></h3>
      <h4><?= Yii::$app->formatter->asCurrency($model->harga) ?></h4>
      <p><?= $model->keterangan ?></p>
    </div>
    <div class="social-icons">
      <?= Html::a('Lihat', ['viewvilla', 'id' => $model->id_villa], ['class' => 'btn btn-primary']) ?>
      <?= Html::a('Pesan Sekarang', ['pesanvilla', 'id' => $model->id_villa], ['class' => 'btn btn-danger']) ?>
    </div>
  </div>
</div>