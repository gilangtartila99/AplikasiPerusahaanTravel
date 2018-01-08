<?php

use yii\helpers\Html;
use yii\widgets\ListView;

?>
<style type="text/css">
.marginku {
  padding-top: 2%;
  padding-bottom: 2%;
}
</style>
  <div class="container">
      <div class="row">
        <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
          <h2>Villa Kami</h2>
          <p>Ini merupakan villa yang kami miliki.</p>
        </div>
      </div> 
    <div class="team-members">
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'summary' => false,
            'itemView' => 'semuavilla',
        ]) ?>
    </div>
</div>