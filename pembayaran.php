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


// mendapatkan id_pembelian dari url
$idpem = $_GET["id"];
$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$idpem'");
$detpem = $ambil->fetch_assoc();

// mendapatkan id_pelanggan yang beli
$id_pelanggan_beli = $detpem["id_pelanggan"];

 // mendapatkan id_pelanggan yang login
$id_pelanggan_login = $_SESSION["pelanggan"]["id_pelanggan"];
if ($id_pelanggan_login !== $id_pelanggan_beli)
{
	echo "<script>alert('Jangan Sembarang !!!');</script>";
	echo "<script>location='riwayat.php';</script>";
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


	<title>BEYOUTIFUL : Pembayaran</title>

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
			<div class="col-md-5">
				<div class="card">
					<div class="card-header text-center" style="background-color:#FF6195; color:#FFF; font-family:'Acme', sans-serif; text-shadow:1px 1px 1px rgba(0,0,0,0.7);">
						<h3>Konfirmasi Pembayaran</h3>
						<p>Kirim Bukti Pembayaran Anda Disini</p>
					</div>
					<div class="card-body">
						<div class="alert alert-info">Total Tagihan Anda : Rp. <strong><?php echo number_format($detpem["total_pembelian"]) ?></strong></div>

						<form method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label><i class="fa fa-user"></i>&nbsp;Nama Penyetor</label>
								<input type="text" class="form-control" name="nama" required>
							</div>
							<div class="form-group">
								<label><i class="fa fa-credit-card"></i>&nbsp;Bank</label>
								<input type="text" class="form-control" name="bank" required>
							</div>
							<div class="form-group">
								<label><b>$</b>&nbsp;Jumlah</label>
								<input type="number" class="form-control" name="jumlah" min="1" required>
							</div>
							<div class="form-group">
								<label><i class="fa fa-image"></i>&nbsp;Foto Bukti</label>
								<input type="file" class="form-control" name="bukti" required>
								<p class="text-danger">Foto bukti harus JPG maksimal 2MB.</p>
							</div>
						</div>
						<div class="card-footer text-center" style="background-color:#FF6195; color:#FFF; font-family:'Acme', sans-serif; text-shadow:1px 1px 1px rgba(0,0,0,0.7);">
							<button id="kirim" class="btn btn-sm btn-default" name="kirim" style="background-color: #FFFFFF;"><i class="fa fa-paper-plane"></i>&nbsp;Kirim</button>
						</form>
					</div>
				</div>
			</div>
		</div>

	</div>



<!-- awal copyright -->
<div class="footer text-center" style="background-color:#FF6195; height: 54px; color: #FFF;  font-family:'Acme', sans-serif; text-shadow:1px 1px 1px rgba(0,0,0,0.7); margin-top: 50px;">
  <p style="padding-top: 16px">© Copyright By BEYOUTIFUL</p>
</div>
<!-- akhir copyright -->



<?php 
	if (isset($_POST['kirim']))
	{
		$namabukti = $_FILES ['bukti']['name'];
		$lokasibukti = $_FILES ['bukti']['tmp_name'];
		$namafiks = date("YmdHis").$namabukti;
		move_uploaded_file($lokasibukti, "bukti_pembayaran/$namafiks");


		$nama = $_POST["nama"];
		$bank = $_POST["bank"];
		$jumlah = $_POST["jumlah"];
		$tanggal = date("Y-m-d");


		$koneksi->query("INSERT INTO pembayaran
		(id_pembelian,nama,bank,jumlah,tanggal,bukti) VALUES ('$idpem','$nama','$bank','$jumlah','$tanggal','$namafiks')");

		// ubah data pembeliannya dari pending ke sudah kirim pembayaran
		$koneksi->query("UPDATE pembelian SET status_pembelian = 'Sudah Kirim Pembayaran' WHERE id_pembelian = 
			'$idpem'") ;


		echo "<script>alert('Terima Kasih Telah Mengirimkan Bukti Pembayaran');</script>";
		echo "<script>location='riwayat.php';</script>";
	}
 ?>



	<!--- JS galeri --->

	<script type="text/javascript" src="swiper.min.js"></script>
	<script src="https:cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="parallaxie.js-master/parallaxie.js"></script>

	<script>
		<!-- scroll navbar -->



		<!-- animasi watch video -->
		$('#kirim').on('mouseenter', function(){
			$(this).addClass('animated rubberBand infinite');
		})

		$('#kirim').on('mouseleave', function(){
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
            call_to_action: "Kirim Pesan", // Call to action
            button_color: "#3FF", // Color of button
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