<?php

use yii\helpers\Html;
use yii\widgets\ListView;

?>
<style type="text/css">
.jaraklihatsemua {
  margin-top: 5%;
}
</style>
<!--.preloader-->
  <!--<div class="preloader"> <i class="fa fa-circle-o-notch fa-spin"></i></div>
  <!--/.preloader-->
<?php if(Yii::$app->user->getIsGuest() OR Yii::$app->user->identity->role == 2) { ?>
  <header id="home">
    <div id="home-slider" class="carousel slide carousel-fade" data-ride="carousel">
      <div class="carousel-inner">
        <div class="item active" style="background-image: url(images/slider/1.jpg)">
          <div class="caption">
            <h1 class="animated fadeInLeftBig">Selamat Datang <span>CV SUKARAI</span></h1>
            <p class="animated fadeInRightBig">TOUR AND TRAVEL</p>
            <a data-scroll class="btn btn-start animated fadeInUpBig" href="#portfolio">Pemesanan Mobil</a>
          </div>
        </div>
        <div class="item" style="background-image: url(images/slider/2.jpg)">
          <div class="caption">
            <h1 class="animated fadeInLeftBig">Selamat Datang <span>CV SUKARAI</span></h1>
            <p class="animated fadeInRightBig">TOUR AND TRAVEL</p>
            <a data-scroll class="btn btn-start animated fadeInUpBig" href="#team">Pemesanan Villa</a>
          </div>
        </div>
        <div class="item" style="background-image: url(images/slider/3.jpg)">
          <div class="caption">
            <h1 class="animated fadeInLeftBig">Selamat Datang <span>CV SUKARAI</span></h1>
            <p class="animated fadeInRightBig">TOUR AND TRAVEL</p>
            <a data-scroll class="btn btn-start animated fadeInUpBig" href="#blog">Pemesanan Paket</a>
          </div>
        </div>
      </div>
      <a class="left-control" href="#home-slider" data-slide="prev"><i class="fa fa-angle-left"></i></a>
      <a class="right-control" href="#home-slider" data-slide="next"><i class="fa fa-angle-right"></i></a>

      <a id="tohash" href="#services"><i class="fa fa-angle-down"></i></a>

    </div><!--/#home-slider-->
  </header><!--/#home-->
<div class="container">
  <section id="services">
    <div class="container">
      <div class="heading wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
        <div class="row">
          <div class="text-center col-sm-8 col-sm-offset-2">
            <h2>Pelayanan Kami</h2>
            <p>Kami menyediakan beberapa pelayanan.</p>
          </div>
        </div> 
      </div>
      <div class="text-center our-services">
        <div class="row">
          <div class="col-sm-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
            <div class="service-icon">
              <i class="fa fa-car"></i>
            </div>
            <div class="service-info">
              <h3>Mobil</h3>
              <p>Mobil yang kami sediakan merupakan mobil keluaran terbaru.</p>
            </div>
          </div>
          <div class="col-sm-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="450ms">
            <div class="service-icon">
              <i class="fa fa-home"></i>
            </div>
            <div class="service-info">
              <h3>Villa</h3>
              <p>Villa yang kami sediakan merupakan villa dengan keadaan yang sangat baik.</p>
            </div>
          </div>
          <div class="col-sm-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="550ms">
            <div class="service-icon">
              <i class="fa fa-briefcase"></i>
            </div>
            <div class="service-info">
              <h3>Paket</h3>
              <p>Kami menyediakan paket penyewaan mobil dan villa dengan harga yang terjangkau.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><!--/#services-->
</div>


  <section id="about-us" class="parallax">
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <div class="about-info wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
            
          </div>
        </div>
      </div>
    </div>
  </section><!--/#about-us-->

  <section id="portfolio">
    <div class="container">
      <div class="row">
        <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
          <h2>Mobil Kami</h2>
          <p>Ini merupakan mobil yang kami miliki.</p>
        </div>
      </div> 
    <div class="team-members">
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'summary' => false,
            'itemView' => 'mobilindex',
        ]) ?>
    </div>

    <br>
    
    <div class="jaraklihatsemua">
      <center><?= Html::a('Lihat Semua', ['allmobil'], ['class' => 'btn btn-primary jaraklihatsemua']) ?></center>
    </div>
  </section><!--/#portfolio-->

  <section id="features" class="parallax">
    <div class="container">

    </div>
  </section><!--/#features-->

  <section id="team">
    <div class="container">
      <div class="row">
        <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="300ms">
          <h2>Villa Kami</h2>
          <p>Ini merupakan villa yang kami miliki.</p>
        </div>
      </div>
      <div class="team-members">
        <?= ListView::widget([
            'dataProvider' => $dataProvider1,
            'summary' => false,
            'itemView' => 'villaindex',
        ]) ?>           
    </div>

    <br>
    
    <div class="jaraklihatsemua">
      <center><?= Html::a('Lihat Semua', ['allvilla'], ['class' => 'btn btn-primary jaraklihatsemua']) ?></center>
    </div>
  </section><!--/#team-->

  <section id="twitter" class="parallax">
    <div>
      <div class="container">
        <div class="row">
          
        </div>
      </div>
    </div>
  </section><!--/#twitter-->

  <section id="blog">
    <div class="container">
      <div class="row">
        <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="300ms">
          <h2>Paket</h2>
          <p>Ini merupakan paket penyewaan mobil dan villa yang tersedia.</p>
        </div>
        </div>
        <div class="team-members">
            <?= ListView::widget([
                'dataProvider' => $dataProvider2,
                'summary' => false,
                'itemView' => 'paketindex',
            ]) ?>
    </div>

    <br>
    
    <div class="jaraklihatsemua">
      <center><?= Html::a('Lihat Semua', ['allpaket'], ['class' => 'btn btn-primary jaraklihatsemua']) ?></center>
    </div>
  </section><!--/#blog-->

  <section id="contact">
    <div id="contact-us" class="parallax">
      <div class="container">
        <div class="row">
          <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
            <h2>Hubungi Kami</h2>
            <p>Silahkan hubungi kami dengan kontak yang telah tertera dibawah ini.</p>
          </div>
        </div>
        
        <center><div class="contact-form wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
          <div class="row">
                <ul class="address">
                  <li><i class="fa fa-map-marker"></i> <span> Address:</span> 2400 South Avenue A </li>
                  <li><i class="fa fa-phone"></i> <span> Phone:</span> +928 336 2000  </li>
                  <li><i class="fa fa-envelope"></i> <span> Email:</span><a href="mailto:someone@yoursite.com"> support@oxygen.com</a></li>
                  <li><i class="fa fa-globe"></i> <span> Website:</span> <a href="#">www.sitename.com</a></li>
                </ul>
              </div>                            
            </div>
          </div>
        </div></center>
      </div>
    </div>        
  </section><!--/#contact-->
</div>
<?php } elseif(Yii::$app->user->identity->role == 3) { ?>
<style type="text/css">
    .kotaku {
        padding-left: 4%;
        padding-right: 4%;
        padding-top: 4%;
        padding-bottom: 4%;
    }
</style>
<div class="container">
    <?php
        include '../config/db.php';

        $date = date('m');

        $sql = "SELECT MONTHNAME(a.tanggal_pesan) as bulan, SUM(b.harga) as harga FROM pesan_mobil a INNER JOIN mobil b ON a.mobil_id=b.id_mobil WHERE MONTH(a.tanggal_pesan)='".$date."' GROUP BY bulan ORDER BY bulan DESC LIMIT 12";
        $result = mysql_query($sql) or die(mysql_error());
        $row = mysql_fetch_array($result);

        $sql2 = "SELECT MONTHNAME(a.tanggal_pesan) as bulan, SUM(b.harga) as harga FROM pesan_villa a INNER JOIN villa b ON a.villa_id=b.id_villa WHERE MONTH(a.tanggal_pesan)='".$date."' GROUP BY bulan ORDER BY bulan DESC LIMIT 12";
        $result2 = mysql_query($sql2) or die(mysql_error());
        $row2 = mysql_fetch_array($result2);

        $sql3 = "SELECT MONTHNAME(a.tanggal_pesan) as bulan, SUM(b.harga) as harga FROM pesan_paket a INNER JOIN paket b ON a.paket_id=b.id_paket WHERE MONTH(a.tanggal_pesan)='".$date."' GROUP BY bulan ORDER BY bulan DESC LIMIT 12";
        $result3 = mysql_query($sql3) or die(mysql_error());
        $row3 = mysql_fetch_array($result3);

        $sql4 = "SELECT COUNT(*) as jumlah FROM pesan_mobil";
        $result4 = mysql_query($sql4) or die(mysql_error());
        $row4 = mysql_fetch_array($result4);

        $sql5 = "SELECT COUNT(*) as jumlah FROM pesan_villa";
        $result5= mysql_query($sql5) or die(mysql_error());
        $row5 = mysql_fetch_array($result5);

        $sql6 = "SELECT COUNT(*) as jumlah FROM pesan_paket";
        $result6 = mysql_query($sql6) or die(mysql_error());
        $row6 = mysql_fetch_array($result6);
    ?>
    <h1 align="center"><b>Hello, <?= Yii::$app->user->identity->nama ?></b></h1>

    <div class="col-lg-6">
      <div class="thumbnail kotaku">
        <center>
          <h3><b>Omset Pemesanan Mobil Bulan <?php echo $row['bulan']; ?></b></h3>
          <h3><b><?php echo Yii::$app->formatter->asCurrency($row['harga']); ?></b></h3>
        </center>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="thumbnail kotaku">
        <center>
          <h3><b>Omset Pemesanan Villa Bulan <?php echo $row2['bulan']; ?></b></h3>
          <h3><b><?php echo Yii::$app->formatter->asCurrency($row2['harga']); ?></b></h3>
        </center>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="thumbnail kotaku">
        <center>
          <h3><b>Omset Pemesanan Paket Bulan <?php echo $row3['bulan']; ?></b></h3>
          <h3><b><?php echo Yii::$app->formatter->asCurrency($row3['harga']); ?></b></h3>
        </center>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="thumbnail kotaku">
        <center>
          <h3><b>Jumlah Pengunjung</b></h3>
          <h3><b><?php echo $row4['jumlah']+$row5['jumlah']+$row6['jumlah']; ?> Pengunjung</b></h3>
        </center>
      </div>
    </div>
</div>
<?php } else { ?>
<style type="text/css">
    .kotaku {
        padding-left: 4%;
        padding-right: 4%;
        padding-top: 4%;
        padding-bottom: 4%;
    }
</style>
<div class="container">
    <?php
        include '../config/db.php';

        $date = date('m');

        $sql4 = "SELECT COUNT(*) as jumlah, MONTHNAME(tanggal_pesan) as bulan FROM pesan_mobil WHERE MONTH(tanggal_pesan)='".$date."'";
        $result4 = mysql_query($sql4) or die(mysql_error());
        $row4 = mysql_fetch_array($result4);

        $sql5 = "SELECT COUNT(*) as jumlah FROM pesan_villa WHERE MONTH(tanggal_pesan)='".$date."'";
        $result5= mysql_query($sql5) or die(mysql_error());
        $row5 = mysql_fetch_array($result5);

        $sql6 = "SELECT COUNT(*) as jumlah FROM pesan_paket WHERE MONTH(tanggal_pesan)='".$date."'";
        $result6 = mysql_query($sql6) or die(mysql_error());
        $row6 = mysql_fetch_array($result6);
    ?>
    <h1 align="center"><b>Hello, <?= Yii::$app->user->identity->nama ?></b></h1>

    <div class="col-lg-12">
      <div class="thumbnail kotaku">
        <center>
          <h3><b>Jumlah Pengunjung Bulan <?php echo $row4['bulan']; ?></b></h3>
          <h3><b><?php echo $row4['jumlah']+$row5['jumlah']+$row6['jumlah']; ?> Pengunjung</b></h3>
        </center>
      </div>
    </div>
</div>
 <?php } ?>
