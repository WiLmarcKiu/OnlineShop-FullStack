<?php 
session_start();

// echo "<pre>";
// print_r($_SESSION['keranjang']);
// echo "</pre>";

include 'koneksi.php';

if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])) 
{
	echo "<script>alert('Keranjang Kosong, Silahkan Belanja Terlebih Dahulu');</script>";
	echo "<script>location='produk.php';</script>";
}
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


	<title>BEYOUTIFUL : Keranjang Anda</title>

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

	</style>

</head>

<body>


			<!-- awal keranjang -->
			
				<br><br><br><br>

				<div class="container">
					<h2 class="text-center" style="font-family:'Marvel', sans-serif; text-shadow:1px 1px 1px rgba(0,0,0,0.7);">Keranjang</h2><hr>	
					<div class="row justify-content-center">
						<table class="table table-bordered table-hover">
							<thead class="table table-primary">
								<tr>
									<th>No</th>
									<th>Nama Produk</th>
									<th>Harga</th>
									<th>Jumlah</th>
									<th>Sub Harga</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $nomor = 1; ?>
								<?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
									<?php $ambil=$koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk'"); 
									$pecah = $ambil->fetch_assoc();
									$subharga = $pecah ["harga_produk"] * $jumlah;

								// echo "<pre>";
								// print_r($pecah);
								// echo "</pre>";
								?>


									<tr>
										<td><?php echo $nomor; ?></td>
										<td><?php echo $pecah["nama_produk"]; ?></td>
										<td>Rp. <?php echo number_format($pecah["harga_produk"]); ?></td>
										<td><?php echo $jumlah; ?></td>
										<td>Rp. <?php echo number_format($subharga); ?></td>
										<td>
											<a id="hapus" href="hapuskeranjang.php?id=<?php echo $id_produk ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>&nbsp;Hapus</a>
										</td>
									</tr>
									<?php $nomor++; ?>
								<?php endforeach ?>
							</tbody>
						</table>
						<a id="belanja" href="produk.php" class="btn btn-sm btn-secondary"><i class="fa fa-share"></i>&nbsp;Lanjutkan Belanja</a>&nbsp;&nbsp;
						<a id="checkout" href="checkout.php" class="btn btn-sm btn-primary"><i class="fa fa-check"></i>&nbsp;Checkout</a>
					</div>
				</div>
			

			<!-- akhir keranjang -->




			<!--- JS galeri --->

			<script type="text/javascript" src="swiper.min.js"></script>
			<script src="https:cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
			<script src="parallaxie.js-master/parallaxie.js"></script>

			<script>
				<!-- scroll navbar -->



				<!-- animasi hapus -->
				$('#hapus').on('mouseenter', function(){
					$(this).addClass('animated rubberBand infinite');
				})

				$('#hapus').on('mouseleave', function(){
					$(this).removeClass('animated rubberBand infinite');
				})

				<!-- animasi lanjutkan belanja -->
				$('#belanja').on('mouseenter', function(){
					$(this).addClass('animated rubberBand infinite');
				})

				$('#belanja').on('mouseleave', function(){
					$(this).removeClass('animated rubberBand infinite');
				})
				<!-- animasi checkout -->
				$('#checkout').on('mouseenter', function(){
					$(this).addClass('animated rubberBand infinite');
				})

				$('#checkout').on('mouseleave', function(){
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