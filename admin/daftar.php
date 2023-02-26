<?php 
session_start();
//skrip koneksi
$koneksi = new mysqli ("localhost","root","","toko_online");
?>

<!DOCTYPE html>
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
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />


  <title>BEYOUTIFUL : Daftar Admin</title>

  <!-- BOOTSTRAP STYLES-->
  <link href="assets/css/bootstrap.css" rel="stylesheet" />
  <!-- FONTAWESOME STYLES-->
  <link href="assets/css/font-awesome.css" rel="stylesheet" />
  <!-- CUSTOM STYLES-->
  <link href="assets/css/custom.css" rel="stylesheet" />
  <!-- GOOGLE FONTS-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

<style>


    <!--- animasi zoom --->
    .zoom {
      transition: transform .8s; /* Animation */
      margin: 0 auto;
    }
    .zoom:hover {
      transform: scale(1.1); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
    }
</style>


</head>
<body>

  <header class="main-header">
    <!-- awal navbar -->
    <nav class="navbar navbar-expand-sm navbar-light fixed-top" style="background-color:#FF6195;">
     <div class="container">
      <a class="navbar-brand" style="color:#FFF; font-family: 'Holtwood One SC', serif; text-shadow:1px 1px 1px rgba(0,0,0,0.7);"
      href="#">BeYouTiful</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link zoom" style="color:#FFF; font-family:'Acme', sans-serif; text-shadow:1px 1px 1px rgba(0,0,0,0.7);
            " href="daftar.php"></i>Daftar Admin</a>
          </li>&nbsp;
          <li class="nav-item">
              <a class="nav-link zoom" style="color:#FFF; font-family:'Acme', sans-serif; text-shadow:1px 1px 1px rgba(0,0,0,0.7);
              " href="login.php"></i>Login</a>
            </li>
        </form>
      </ul>
 </div>

  </nav>
  <!-- akhir navbar -->
</header>



  <br><br>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header text-center" style="background-color:#FF6195; color:#FFF; font-family:'Acme', sans-serif; text-shadow:1px 1px 1px rgba(0,0,0,0.7);">
            <h3><i class="fa fa-users"></i>&nbsp;&nbsp;Daftar Admin</h3>
          </div>
          <div class="card-body">
            <form method="post" enctype="multipart/form-data">
              <div class="form-group">
                <i class="fa fa-tags"  ></i></span>
                <label>Nama Lengkap</label>
                <input type="text" class="form-control" name="nama_lengkap" placeholder="Masukan nama anda" required autocomplete="off">
              </div>
              <div class="form-group">
                <i class="fa fa-user"  ></i></span>
                <label>Username</label>
                <input type="text" class="form-control" name="username" placeholder="Masukan username anda" required autocomplete="off">
              </div>
              <div class="form-group">
                <i class="fa fa-lock"  ></i></span>
                <label>Password</label>
                <input type="text" class="form-control" name="password" placeholder="Masukan password anda" required autocomplete="off">
              </div>
              <div class="form-group">
                <i class="fa fa-photo"></i> <label>Foto Anda</label>
                <input type="file" class="form-control" name="foto_admin" required>
              </div>
              
            </div>
            <div class="card-footer text-center" style="background-color:#FF6195;">
              <button class="btn btn-default daftar" name="daftar"  style="background-color: #FFFFFF;"><i class="fa fa-send"></i>&nbsp;Daftar</button>
            </form>


            <?php 
            if (isset($_POST["daftar"]))
            {

              // mengambil isian nama, email, password, telepon, alamat
              $nama_lengkap = $_POST["nama_lengkap"];
              $username = $_POST["username"];
              $password = $_POST["password"];

              // cek apakah email sudah digunakan
              $ambil = $koneksi->query("SELECT * FROM admin WHERE username = '$username'");
              $yangcocok = $ambil->num_rows;

              if ($yangcocok == 1)
              {
                echo "<script>alert('Pendaftaran Gagal, Username Telah di Gunakan');</script>";
                echo "<script>location='daftar.php';</script>";
              }
              else 
              {
                // query insert ke tabel admin
                $foto = $_FILES ['foto_admin']['name'];
                $lokasi = $_FILES ['foto_admin']['tmp_name'];
                move_uploaded_file($lokasi, "../foto_admin/".$foto);
                $koneksi->query ("INSERT INTO admin
                  (nama_lengkap,username,password,foto_admin)
                  VALUES ('$nama_lengkap','$username','$password','$foto')");

                echo "<script>alert('Pendaftaran Sukses');</script>";
                echo "<script>alert('Silahkan Login');</script>";
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
<div class="footer text-center" style="background-color:#FF6195; height: 56px; color: #FFF;  font-family:'Acme', sans-serif; text-shadow:1px 1px 1px rgba(0,0,0,0.7); margin-top: 74px;">
  <p style="padding-top: 18px">© Copyright By BEYOUTIFUL</p>
</div>
<!-- akhir copyright -->




  <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
  <!-- JQUERY SCRIPTS -->
  <script src="assets/js/jquery-1.10.2.js"></script>
  <!-- BOOTSTRAP SCRIPTS -->
  <script src="assets/js/bootstrap.min.js"></script>
  <!-- METISMENU SCRIPTS -->
  <script src="assets/js/jquery.metisMenu.js"></script>
  <!-- CUSTOM SCRIPTS -->
  <script src="assets/js/custom.js"></script>

</body>
</html>
