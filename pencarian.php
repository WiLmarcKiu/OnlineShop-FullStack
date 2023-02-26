<?php 
session_start();
//koneksi ke database
include 'koneksi.php';
 ?>
<?php include'menu.php'; 

$keyword = $_GET["keyword"];

$semuadata = array();
$ambil = $koneksi->query("SELECT * FROM produk WHERE nama_produk LIKE '%$keyword%' OR deskripsi_produk 
  LIKE '%$keyword%'");

while ($pecah = $ambil->fetch_assoc()) 
{
  $semuadata[] = $pecah; 
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


  <title>BEYOUTIFUL-Start Change From You</title>

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
  background-color: #CCC;
}

</style>

</head>

<body>

<br><br><br>

<div class="container">
 <h3 style="font-family:'Marvel', sans-serif; text-shadow:1px 1px 1px rgba(0,0,0,0.7);">Hasil Pencarian : <?php echo $keyword; ?></h3>

<?php if (empty($semuadata)): ?>
  <div class="alert alert-danger">Produk <b><?php echo $keyword; ?></b> tidak ditemukan</div>
<?php endif ?>

    <div class="row">
      
      <?php foreach ($semuadata as $key => $value): ?>


 <div class="col-md-3 mb-3 mt-3">
        <div class="card" style="box-shadow: -2px 2px 16px 4px #e2e2e2;">
          <img src="foto_produk/<?php echo $value['foto_produk']; ?>" class="card-img-top" alt="...">
          <div class="card-body text-center">
            <h5 class="card-title" style="font-family:'Marvel', sans-serif; text-shadow:1px 1px 1px rgba(0,0,0,0.7);"><?php echo($value['nama_produk']); ?></h5>
            <strong><p class="card-title" style="color: #FF6195; font-family:'Marvel', sans-serif; text-shadow:1px 1px 1px rgba(0,0,0,0.7);">Rp. <?php echo number_format($value['harga_produk']); ?></p></strong>
            <a href="detail.php?id=<?php echo($value['id_produk']); ?>" class="btn btn-sm btn-dark detail" style="color: #FFF; background-color: #000;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-eye"></i>&nbsp;Lihat Produk&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
          </div>
        </div>
      </div>

      <?php endforeach ?>

    </div>

</div>


<!-- awal copyright -->
<div class="footer text-center" style="background-color:#FF6195; height: 54px; color: #FFF;  font-family:'Acme', sans-serif; text-shadow:1px 1px 1px rgba(0,0,0,0.7); margin-top: 100px;">
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