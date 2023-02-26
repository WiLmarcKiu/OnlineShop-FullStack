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


  <title>BEYOUTIFUL : Daftar Pelanggan</title>

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
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header text-center" style="background-color:#FF6195; color:#FFF; font-family:'Acme', sans-serif; text-shadow:1px 1px 1px rgba(0,0,0,0.7);">
            <h3><i class="fa fa-users"></i>&nbsp;&nbsp;Daftar Pelanggan</h3>
          </div>
          <div class="card-body">
            <form method="post">
              <div class="form-group">
                <i class="fa fa-tags"  ></i></span>
                <label>Nama</label>
                <input type="text" class="form-control" name="nama" placeholder="Masukan nama anda" required autocomplete="off">
              </div>
              <div class="form-group">
                <i class="fa fa-envelope-open"  ></i></span>
                <label>Email</label>
                <input type="email" class="form-control" name="email" placeholder="Masukan email anda" required autocomplete="off">
              </div>
              <div class="form-group">
                <i class="fa fa-lock"  ></i></span>
                <label>Password</label>
                <input type="text" class="form-control" name="password" placeholder="Masukan password anda" required autocomplete="off">
              </div>
              <div class="form-group">
                <i class="fa fa-phone"  ></i></span>
                <label>Telp/Hp</label>
                <input type="text" class="form-control" name="telepon" placeholder="Masukan kontak anda" required autocomplete="off">
              </div>
              <div class="form-group">
                <i class="fa fa-map-pin"  ></i></span>
                <label>Alamat</label>
                <textarea class="form-control" name="alamat" required autocomplete="off"></textarea>
              </div>
              
            </div>
            <div class="card-footer text-center" style="background-color:#FF6195;">
              <button class="btn btn-sm btn-default daftar" name="daftar" style="background-color: #FFFFFF;"><i class="fa fa-paper-plane"></i>&nbsp;Daftar</button>
            </form>


            <?php 
            if (isset($_POST["daftar"]))
            {

              // mengambil isian nama, email, password, telepon, alamat
              $nama = $_POST["nama"];
              $email = $_POST["email"];
              $password = $_POST["password"];
              $telepon = $_POST["telepon"];
              $alamat = $_POST["alamat"];

              // cek apakah email sudah digunakan
              $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan = '$email'");
              $yangcocok = $ambil->num_rows;

              if ($yangcocok == 1)
              {
                echo "<script>alert('Pendaftaran Gagal, Email Telah di Gunakan');</script>";
                echo "<script>location='daftar.php';</script>";
              }
              else 
              {
                // query insert ke tabel pelanggan
                $koneksi->query("INSERT INTO pelanggan (nama_pelanggan,email_pelanggan,password_pelanggan,telepon_pelanggan,alamat_pelanggan) VALUES 
                  ('$nama','$email','$password','$telepon','$alamat')");

                echo "<script>alert('Pendaftaran Sukses, Silahkan Login');</script>";
                echo "<script>location='login.php';</script>";
              }

            }
            ?>


          </div>
        </div>
      </div>
    </div>
  </div>

<!-- awal copyright -->
<div class="footer text-center" style="background-color:#FF6195; height: 54px; color: #FFF;  font-family:'Acme', sans-serif; text-shadow:1px 1px 1px rgba(0,0,0,0.7); margin-top: 52px;">
  <p style="padding-top: 16px">© Copyright By BEYOUTIFUL</p>
</div>
<!-- akhir copyright -->


  <!--- JS galeri --->

  <script type="text/javascript" src="swiper.min.js"></script>
  <script src="https:cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="parallaxie.js-master/parallaxie.js"></script>

  <script>
    <!-- scroll navbar -->



    <!-- animasi watch video -->
    $('.daftar').on('mouseenter', function(){
      $(this).addClass('animated rubberBand infinite');
    })

    $('.daftar').on('mouseleave', function(){
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