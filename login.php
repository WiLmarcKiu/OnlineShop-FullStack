<?php
session_start();

// echo "<pre>";
// print_r($_SESSION['keranjang']);
// echo "</pre>";

include 'koneksi.php';

?>
<?php include 'menu.php'; ?>
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


	<title>BEYOUTIFUL : Login Pelanggan</title>

	<style>
		<!--- animasi zoom -
		-->
		.zoom
		{
		transition:
		transform
		.8s;
		/*
		Animation
		*/
		margin:
		0
		auto;
		}
		.zoom:hover
		{
		transform:
		scale(1.1);
		/*
		(150%
		zoom
		-
		Note:
		if
		the
		zoom
		is
		too
		large,
		it
		will
		go
		outside
		of
		the
		viewport)
		*/
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

	</style>

</head>

<body>


	<br><br><br><br><br><br><br>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-4">
				<div class="card">
					<div class="card-header text-center" style="background-color:#FF6195; color:#FFF; font-family:'Acme', sans-serif; text-shadow:1px 1px 1px rgba(0,0,0,0.7);">
						<h3><i class="fa fa-user"></i>&nbsp;&nbsp;Login Pelanggan</h3>
					</div>
					<div class="card-body">
						<form method="post">
							<div class="form-group">
								<i class="fa fa-envelope-open"></i></span>
								<label>Email</label>
								<input type="email" class="form-control" name="email" placeholder="Masukan email anda" autocomplete="off" required>
							</div>
							<div class="form-group">
								<i class="fa fa-lock"></i></span>
								<label>Password</label>
								<input type="password" class="form-control" name="password" placeholder="Masukan password anda" autocomplete="off" required>
							</div>


					</div>
					<div class="card-footer text-center" style="background-color:#FF6195;">
						<button class="btn btn-sm btn-default login" name="login" style="background-color: #FFFFFF;"><i class="fa fa-arrow-circle-right"></i>&nbsp;Login</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>


	<?php
	// jika ada tombol login (tombol login ditekan)
	if (isset($_POST["login"])) {
		$email = $_POST["email"];
		$password = $_POST["password"];

		// lakukan query cek akun di tabel pelanggan pada database
		$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan = '$email' AND password_pelanggan = 
			'$password'");

		// hitung akun yang terambil
		$akunyangcocok = $ambil->num_rows;

		// jika 1 akun yang cocok maka diloginkan
		if ($akunyangcocok == 1) {
			//anda sukses login
			// mendapatkan akun dalam bentuk array
			$akun = $ambil->fetch_assoc();

			// simpan di session pelanggan
			$_SESSION["pelanggan"] = $akun;
			echo "<script>alert('Anda Sukses Login');</script>";

			// jika sudah belanja
			if (isset($_SESSION["keranjang"]) or !empty($_SESSION["keranjang"])) {
				echo "<script>location='checkout.php';</script>";
			} else {
				echo "<script>location='riwayat.php';</script>";
			}
		} else {
			// anda gagal login
			echo "<script>alert('Anda Gagal Login Mohon Periksa Kembali Akun Anda');</script>";
			echo "<script>location='login.php';</script>";
		}
	}
	?>

	<!-- awal copyright -->
	<div class="footer text-center" style="background-color:#FF6195; height: 54px; color: #FFF;  font-family:'Acme', sans-serif; text-shadow:1px 1px 1px rgba(0,0,0,0.7); margin-top: 140px;">
		<p style="padding-top: 16px">© Copyright By BEYOUTIFUL</p>
	</div>
	<!-- akhir copyright -->

	<!--- JS galeri --->

	<script type="text/javascript" src="swiper.min.js"></script>
	<script src="https:cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="parallaxie.js-master/parallaxie.js"></script>

	<script>
		<!-- scroll navbar 
		-->



	<!-- animasi watch video -->
	$('.login').on('mouseenter', function(){
	$(this).addClass('animated rubberBand infinite');
	})

	$('.login').on('mouseleave', function(){
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
		(function() {
			var options = {
				whatsapp: "+6285338318819", // WhatsApp number
				call: "+6285338318819", // Call phone number
				call_to_action: "Hubungi Kami", // Call to action
				button_color: "#FF6195", // Color of button
				position: "right", // Position may be 'right' or 'left'
				order: "call,whatsapp", // Order of buttons
			};
			var proto = document.location.protocol,
				host = "getbutton.io",
				url = proto + "//static." + host;
			var s = document.createElement('script');
			s.type = 'text/javascript';
			s.async = true;
			s.src = url + '/widget-send-button/js/init.js';
			s.onload = function() {
				WhWidgetSendButton.init(host, proto, options);
			};
			var x = document.getElementsByTagName('script')[0];
			x.parentNode.insertBefore(s, x);
		})();
	</script>
	<!-- /GetButton.io widget -->


</body>

</html>