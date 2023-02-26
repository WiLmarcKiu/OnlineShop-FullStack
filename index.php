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
 #watch:hover {
    background-color: #FFF;
  }
 

</style>

</head>

<body>


  <!-- awal jumbotron -->
  <div class="jumbotron" style="background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url(gambar/jumbotron.jpg); background-size:cover; width:100%; height:100vh; margin-bottom: 0;">
    <div class="container text-center" style="color:#FFF; font-family: 'Oswald', sans-serif; font-weight:bold;">
      <h1 class="display-4 animated bounceInLeft"
      style="padding-top:200px; animation-delay:1s; text-shadow:1px 1px 1px rgba(0,0,0,0.9);">
      SELAMAT <span style="color:#FF6195;">DATANG</span></h1>
      <p class="lead animated bounceInRight" style="animation-delay:2s; text-shadow:1px 1px 1px rgba(0,0,0,0.7);">Di Toko Online Skincare Terpercaya "BEYOUTIFUL". Start Change From You</p>
      <a href="video/skincare.mp4"><button type="button" id="watch" class="btn animated zoomIn" style="animation-delay:3s; text-shadow:1px 1px 1px rgba(0,0,0,0.7); border-radius:45px; border-color: #FF6195; border-width: 2px; color: #FF6195">    	WATCH VIDEO    </button></a>
    </div>
  </div>

  <!-- akhir jumbotron -->


<!-- awal copyright -->
<div class="footer text-center" style="background-color:#FF6195; height: 54px; padding-top: 16px; color: #FFF;  font-family:'Acme', sans-serif; text-shadow:1px 1px 1px rgba(0,0,0,0.7);">
  <p>© Copyright By BEYOUTIFUL</p>
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
            whatsapp: "+6285238970733", // WhatsApp number
            call: "+6285238970733", // Call phone number
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