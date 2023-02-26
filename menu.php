<?php 
include 'koneksi.php';
?>
  <header class="main-header">
    <!-- awal navbar -->
    <nav class="navbar navbar-expand-sm navbar-light fixed-top" style="background-color: #FF6195;">
     <div class="container">
      <a class="navbar-brand" style="color:#FFF; font-family: 'Holtwood One SC', serif; text-shadow:1px 1px 1px rgba(0,0,0,0.7);"
      href="index.php">BeYouTiful</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <!--
          <li class="nav-item dropdown"> <a class="nav-link zoom dropdown-toggle" style="color:#FFF; font-family:'Acme', sans-serif; text-shadow:1px 1px 1px rgba(0,0,0,0.7);" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Kategori </a>
            <div class="dropdown-menu" style="background-color:#999;"> 
              <a class="dropdown-item text-white" href="#" data-toggle="modal" data-target="#myModalDdokter">Madame Gie</a> 
              <a class="dropdown-item text-white" href="#" data-toggle="modal" data-target="#myModalDperawat">Maybelline</a> 
              <a class="dropdown-item text-white" href="#" data-toggle="modal" data-target="#myModalDpd">Emina</a> 
              <a class="dropdown-item text-white" href="#" data-toggle="modal" data-target="#myModalDklinik">Revlon</a> 
              <a class="dropdown-item text-white" href="#" data-toggle="modal" data-target="#myModalDkegiatan">Sari Ayu</a> 
              <a class="dropdown-item text-white" href="#" data-toggle="modal" data-target="#myModalDkegiatan">Viva</a>
              <a class="dropdown-item text-white" href="#" data-toggle="modal" data-target="#myModalDkegiatan">Wardah</a>
            </div>
          </li>
        -->
        <li class="nav-item">
          <a class="nav-link zoom" style="color:#FFF; font-family:'Acme', sans-serif; text-shadow:1px 1px 1px rgba(0,0,0,0.7);
          " href="tentang_kami.php"></i>Tentang Kami</a>
        </li>
        <li class="nav-item">
          <a class="nav-link zoom" style="color:#FFF; font-family:'Acme', sans-serif; text-shadow:1px 1px 1px rgba(0,0,0,0.7);
          " href="produk.php"></i>Produk</a>
        </li>
        <li class="nav-item">
          <a class="nav-link zoom" style="color:#FFF; font-family:'Acme', sans-serif; text-shadow:1px 1px 1px rgba(0,0,0,0.7);
          " href="keranjang.php">Keranjang
          <?php 
          if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"]))  {
           ?>
          <span class="badge bg-light navbar-badge"></span>
        <?php } else{ ?>
          <span class="badge bg-light navbar-badge animated rubberBand infinite text-dark"><b>!</b></span>
          <?php } ?>
        </a>    
        </li>
        <li class="nav-item">
          <a class="nav-link zoom" style="color:#FFF; font-family:'Acme', sans-serif; text-shadow:1px 1px 1px rgba(0,0,0,0.7);
          " href="checkout.php"></i>Checkout</a>
        </li>

        <!-- jika sudah login(ada session pelanggan) -->
        <?php if (isset($_SESSION["pelanggan"])): ?>

          <li class="nav-item">
            <a class="nav-link zoom" style="color:#FFF; font-family:'Acme', sans-serif; text-shadow:1px 1px 1px rgba(0,0,0,0.7);
            " href="riwayat.php">Riwayat Belanja</a>
          </li>
          <li class="nav-item">
            <a class="nav-link zoom" style="color:#FFF; font-family:'Acme', sans-serif; text-shadow:1px 1px 1px rgba(0,0,0,0.7);
            " href="penilaian_toko.php">Penilaian Toko</a>
          </li>
          <li class="nav-item">
            <a class="nav-link zoom" style="color:#FFF; font-family:'Acme', sans-serif; text-shadow:1px 1px 1px rgba(0,0,0,0.7);
            " href="logout.php"></i>Logout</a>
          </li>

          <!-- selain itu (belum login||belum ada session pelanggan) -->
          <?php else: ?>

            <li class="nav-item">
              <a class="nav-link zoom" style="color:#FFF; font-family:'Acme', sans-serif; text-shadow:1px 1px 1px rgba(0,0,0,0.7);
              " href="daftar.php">Daftar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link zoom" style="color:#FFF; font-family:'Acme', sans-serif; text-shadow:1px 1px 1px rgba(0,0,0,0.7);
              " href="login.php"></i>Login</a>
            </li>
          <?php endif ?>
        </form>
      </ul>

      <form action="pencarian.php" method="get" class="d-flex ml-auto pt-0 mb-0">
        <input class="form-control me-2" type="text" placeholder="Cari" name="keyword" autocomplete="off" style="height: 27px; border-radius: 30px;" autofocus>&nbsp;
        <button id="cari" class="btn btn-sm btn-default" style="border-radius: 40px; background-color: #FFFFFF;"><i class="fa fa-search"></i></button>
      </form> 
        

    </div>

  </nav>
  <!-- akhir navbar -->
</header>



<!--- JS galeri --->

<script type="text/javascript" src="swiper.min.js"></script>
<script src="https:cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="parallaxie.js-master/parallaxie.js"></script>

<script>
  <!-- scroll navbar -->



  <!-- animasi tombol cari -->
  $('#cari').on('mouseenter', function(){
    $(this).addClass('animated rubberBand infinite');
  })

  $('#cari').on('mouseleave', function(){
    $(this).removeClass('animated rubberBand infinite');
  })

  </script>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>