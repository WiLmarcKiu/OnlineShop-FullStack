<?php 
session_start();
//koneksi ke database
include 'koneksi.php';
 ?>
 <?php include'menu.php'; 

// jika tidak ada session pelanggan (belum login)
 if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"]))
 {
    echo "<script>alert('Silahkan Login Terlebih Dahulu');</script>";
    echo "<script>location='login.php';</script>";
    exit();
 }

 ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <!--- link icon --->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--- link lightbox --->
  <link rel="stylesheet" type="text/css" href="lightbox.min.css" />
  <script src="lightbox-plus-jquery.min.js"></script>
  <!--- link animasi swiper --->
  <link rel="stylesheet" type="text/css" href="swiper.min.css" />
  <!--- link animasi tulisan --->
  <link rel="stylesheet" href="animate.css-master/animate.css" />
  <!-- font style -->
  <link href="https://fonts.googleapis.com/css?family=Acme|Creepster|Faster+One|Holtwood+One+SC|Sedgwick+Ave&display=swap" rel="stylesheet">  
  <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Zhi+Mang+Xing&display|Marvel=swap" rel="stylesheet">


  <title>BEYOUTIFUL : Riwayat Belanja</title>

  <style>


    <!--- animasi zoom --->
    .zoom {
      transition: transform .8s; /* Animation */
      margin: 0 auto;
    }
    .zoom:hover {
      transform: scale(1.1); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
    }

    <!---- navbar ---->
    .dropdown-menu{
     display: none;
   }
   .dropdown:hover .dropdown-menu {
     display: block;
   }  
   .dropdown-item:hover {
     background-color:#009999;
   }


  <!---- parallax jumbotron ---->
  .jumbotron{
   background-attachment: fixed;
 }
 <!---- galeri ---->
 section.galeri {
  font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
  font-size: 14px;
  color:#000;
  margin: 0;
  padding: 0;
}
.card img:hover {
  filter: grayscale(100%);
  transform: scale(1.1);
  transition: 1s;
}
#watch:hover {
  background-color: #CCC;
}

</style>

</head>

<body>

<br><br><br><br>

<div class="container">
  <h3 class="text-center" style="font-family:'Marvel', sans-serif; text-shadow:1px 1px 1px rgba(0,0,0,0.7);">Riwayat Belanja <?php echo $_SESSION["pelanggan"]["nama_pelanggan"] ?></h3><hr>
<table class="table table-bordered table-hover">
  <thead class="table table-primary">
    <tr>
      <th>No</th>
      <th>Tanggal</th>
      <th>Status</th>
      <th>Total</th>
      <th>Opsi</th>
    </tr>
  </thead>
  <tbody>
    <?php $nomor = 1; ?>


     <!-- konfigurasi pagination -->
          <?php  

          $jumlahDataPerHalaman = 6;
          $jumlahData = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM pembelian "));
          $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
          if (isset($_GET["halaman"])) {
            $halamanAktif = $_GET['halaman'];
          }
          else {
            $halamanAktif = 1;
          }
          $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

          ?>
          <!-- akhir konfigurasi pagination -->


    <?php 

    // mendapatkan id_pelanggan yang login
    $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];


    $ambil = $koneksi->query ("SELECT * FROM pembelian WHERE id_pelanggan ='$id_pelanggan' LIMIT $awalData, $jumlahDataPerHalaman"); ?>
     <?php 
     while ($pecah = $ambil->fetch_assoc()) { ?>

    <tr>
      <td><?php echo $nomor; ?></td>
      <td><?php echo $pecah["tanggal_pembelian"] ?></td>
      <td>
        <?php echo $pecah["status_pembelian"] ?><br>
        <?php if (!empty($pecah['resi_pengiriman'])): ?>
          Resi : <?php echo $pecah['resi_pengiriman']; ?>
        <?php endif ?>
      </td>
      <td>Rp. <?php echo number_format($pecah["total_pembelian"]) ?></td>
      <td>
        <a href="nota.php?id=<?php echo $pecah ['id_pembelian']; ?>" class="btn btn-sm btn-info nota"><i class="fa fa-envelope"></i>&nbsp;Nota</a>&nbsp;

        <?php if ($pecah['status_pembelian']=="Pending"): ?>
          <a href="pembayaran.php?id=<?php echo $pecah ['id_pembelian']; ?>" class="btn btn-sm btn-success input">
              <i class="fa fa-download"></i>&nbsp;Input Pembayaran
          </a>

          <?php else: ?>
            <a href="lihat_pembayaran.php?id=<?php echo($pecah["id_pembelian"]); ?>" class="btn btn-sm btn-warning lihat"><i class="fa fa-eye"></i>&nbsp;Lihat Pembayaran</a>

        <?php endif ?>
      </td>
    </tr>
    <?php $nomor++; ?>
    <?php } ?>
  </tbody>
</table>

</div>

<!-- navigasi pagination -->

          <nav>
            <ul class="pagination justify-content-center">
              <!-- tombol sebelumnya -->
              <?php if ($halamanAktif <= 1) { ?>
                <li class="page-item disabled"><a href="?halaman= <?php echo $halamanAktif -1; ?>" class="page-link">Sebelumnya</a></li>
              <?php } else{ ?>
                <li class="page-item"><a href="?halaman= <?php echo $halamanAktif -1; ?>" class="page-link" style="color: #000000;">Sebelumnya</a></li>
              <?php } ?>
              <!-- akhir tombol sebelumnya -->


              <?php for ($i =1; $i<=$jumlahHalaman; $i++) { ?>
                <?php if ($i == $halamanAktif) : ?>
                    <li class="page-item"><a href="?halaman= <?php echo $i; ?>" class="page-link" style="background-color: #CCC; color: #000000;"><?php echo $i; ?>
                    </a></li>
                <?php else : ?>
                    <li class="page-item"><a href="?halaman= <?php echo $i; ?>" class="page-link" style="color: #000000;"><?php echo $i; ?>
                    </a></li>
            <?php endif; ?>
            <?php } ?>


            <!-- tombol selanjutnya -->
            <?php if ($halamanAktif >= $jumlahHalaman) { ?>
              <li class="page-item disabled"><a href="?halaman= <?php echo $halamanAktif +1; ?>" class="page-link">Selanjutnya</a></li>
            <?php } else{ ?>
              <li class="page-item"><a href="?halaman= <?php echo $halamanAktif +1; ?>" class="page-link" style="color: #000000;">Selanjutnya</a></li>
            <?php } ?>
            <!-- akhir tombol selanjutnya -->
          </ul> 
        </nav>

        <!-- navigasi pagination -->


<!--- JS galeri --->

<script type="text/javascript" src="swiper.min.js"></script>
<script src="https:cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="parallaxie.js-master/parallaxie.js"></script>

<script>
  <!-- scroll navbar -->



  <!-- animasi tombol nota -->
  $('.nota').on('mouseenter', function(){
    $(this).addClass('animated rubberBand infinite');
  })

  $('.nota').on('mouseleave', function(){
    $(this).removeClass('animated rubberBand infinite');
  })

  <!-- animasi tombol lihat pembayaran -->
  $('.lihat').on('mouseenter', function(){
    $(this).addClass('animated rubberBand infinite');
  })

  $('.lihat').on('mouseleave', function(){
    $(this).removeClass('animated rubberBand infinite');
  })
  <!-- animasi input pembayaran -->
  $('.input').on('mouseenter', function(){
    $(this).addClass('animated rubberBand infinite');
  })

  $('.input').on('mouseleave', function(){
    $(this).removeClass('animated rubberBand infinite');
  })

  <!-- parallax -->  
  $('.jumbotron').parallaxie({
    speed: 0.5
  });

  
  <!-- swiper --> 
  var swiper = new Swiper('.swiper-container', {
    effect: 'coverflow',
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: 'auto',
    coverflowEffect: {
      rotate: 50,
      stretch: 0,
      depth: 100,
      modifier: 1,
      slideShadows : true,
    },
    pagination: {
      el: '.swiper-pagination',
    },
  });
</script>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>



<!-- GetButton.io widget -->
<script type="text/javascript">
  (function () {
    var options = {
            whatsapp: "+6285338318819", // WhatsApp number
            call: "+6285338318819", // Call phone number
            call_to_action: "Hubungi Kami", // Call to action
            button_color: "#FF6195", // Color of button
            position: "right", // Position may be 'right' or 'left'
            order: "call,whatsapp", // Order of buttons
          };
          var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
          var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
          s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
          var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
        })();
      </script>
      <!-- /GetButton.io widget -->


    </body>
    </html>