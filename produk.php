<?php 
session_start();
//koneksi ke database
include 'koneksi.php';
?>
<?php include'menu.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <!-- FONTAWESOME STYLES-->
  <link href="../assets/css/font-awesome.css" rel="stylesheet" />
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


  <title>BEYOUTIFUL : Halaman Produk</title>

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
  .card:hover {
    transform: scale(1.05);
    box-shadow: 3px 3px 3px rgba(0,0,0,0.5);
    transition: 1s;
  }
  #watch:hover {
    background-color: #FFF;
  }

</style>

</head>

<body>

  <section class="galeri pb-4">
    <div class="container">
      <!---- judul halaman produk ---->
      <div class="row">
        <div class="col-sm-12 text-center">
          <br><br><br><br>

          <div class="container">
            <h2 style="font-family:'Marvel', sans-serif; text-shadow:1px 1px 1px rgba(0,0,0,0.7);">Produk</h2><hr>  

          </div>
        </div>
      </div>
      <!---- isi Produk ---->


        <div class="row">

          <!-- konfigurasi pagination -->
          <?php  

          $jumlahDataPerHalaman = 4;
          $jumlahData = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM produk"));
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

          <?php $ambil = $koneksi->query("SELECT * FROM produk LIMIT $awalData, $jumlahDataPerHalaman"); ?>
          <?php while ($perproduk = $ambil->fetch_assoc()) { ?>

            <div class="col-md-3 mb-3 mt-3">
              <div class="card" style="box-shadow: -1px 1px 10px 1px rgba(0,0,0,0.5);">
                <img src="foto_produk/<?php echo($perproduk['foto_produk']); ?>" class="card-img-top" alt="...">
                <div class="card-body text-center">
                  <h5 class="card-title" style="font-family:'Marvel', sans-serif; text-shadow:1px 1px 1px rgba(0,0,0,0.7);"><?php echo($perproduk['nama_produk']); ?></h5>
                  <strong><p class="card-title" style="color: #FF6195; font-family:'Marvel', sans-serif; text-shadow:
                  1px 1px 1px rgba(0,0,0,0.7);">Rp. <?php echo number_format($perproduk['harga_produk']); ?></p></strong>
                  <a href="detail.php?id=<?php echo($perproduk['id_produk']); ?>" class="btn btn-sm btn-dark detail" style="color: #FFF; background-color: #000;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-eye"></i>&nbsp;Lihat Produk&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                </div>
              </div>
            </div>
          <?php }  ?>
          </div>
<br>
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
      </div></section>

<!-- awal copyright -->
<div class="footer text-center" style="background-color:#FF6195; height: 54px; color: #FFF;  font-family:'Acme', sans-serif; text-shadow:1px 1px 1px rgba(0,0,0,0.7); margin-top: 10px;">
  <p style="padding-top: 16px">© Copyright By BEYOUTIFUL</p>
</div>
<!-- akhir copyright -->
    






    <!--- JS galeri --->

    <script type="text/javascript" src="swiper.min.js"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="parallaxie.js-master/parallaxie.js"></script>

    <script>
      <!-- scroll navbar -->



      <!-- animasi icon beli -->
      $('.beli').on('mouseenter', function(){
        $(this).addClass('animated rubberBand infinite');
      })

      $('.beli').on('mouseleave', function(){
        $(this).removeClass('animated rubberBand infinite');
      })

      <!-- animasi icon detail -->
      $('.detail').on('mouseenter', function(){
        $(this).addClass('animated rubberBand infinite');
      })

      $('.detail').on('mouseleave', function(){
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