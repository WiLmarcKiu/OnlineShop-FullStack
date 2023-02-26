<?php 
session_start();
//koneksi ke database
include 'koneksi.php';

// mendapatkan id_produk dari url
$id_produk = $_GET["id"];

// query ambil data
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
$detail = $ambil-> fetch_assoc();
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


	<title>BEYOUTIFUL : Detail Produk</title>

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


<br><br><br><br>
 <div class="container">
 	<div class="row">
 		<div class="col-md-6">
 			<img src="foto_produk/<?php echo $detail["foto_produk"]; ?>" class="image-responsive" style="width: 400px; height: 400px;">
 		</div>
 		<div class="col-md-6">
 			<h3 style="font-family:'Marvel', sans-serif; text-shadow:1px 1px 1px rgba(0,0,0,0.7);"><?php echo $detail["nama_produk"]; ?></h3>
 			<h5 class="text-info" style=" font-family:'Marvel', sans-serif; text-shadow:1px 1px 1px rgba(0,0,0,0.7);">Rp. <?php echo number_format($detail["harga_produk"]); ?></h5>
 			<h6>Stok : <?php echo $detail["stok_produk"]; ?></h6>

 			<form method="post">
 				<div class="form-group">
 					<div class="input-group">
 						<input type="number" min="1" max="<?php echo $detail["stok_produk"]; ?>" class="form-control" name="jumlah" placeholder="Jumlah yang ingin dibeli" required>&nbsp;
 						<div class="input-group-btn">
 							<button class="btn btn-info beli" name="beli" style="color: #FFF;"><i class="fa fa-shopping-bag"></i>&nbsp;Beli</button>
 						</div>
 					</div>
 				</div>
 			</form>


 			<?php 
 				// jika ada tombol beli
 			if (isset($_POST["beli"]))
 			{
 				// mendapatkan jumlah yang diinputkan
 				$jumlah = $_POST["jumlah"];

 				// masukan di keranjang belanja 
 				$_SESSION["keranjang"][$id_produk] = $jumlah ;

 				echo "<script>alert('Produk telah masuk ke keranjang belanja');</script>";
				echo "<script>location='keranjang.php';</script>";
 			}
 			 ?>

 			<p><?php echo $detail["deskripsi_produk"]; ?></p>


 		</div>
 	</div>
 </div>



<!-- awal copyright -->
<div class="footer text-center" style="background-color:#FF6195; height: 54px; color: #FFF;  font-family:'Acme', sans-serif; text-shadow:1px 1px 1px rgba(0,0,0,0.7); margin-top: 147px;">
  <p style="padding-top: 16px">© Copyright By BEYOUTIFUL</p>
</div>
<!-- akhir copyright -->

<!--- JS galeri --->

			<script type="text/javascript" src="swiper.min.js"></script>
			<script src="https:cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
			<script src="parallaxie.js-master/parallaxie.js"></script>

			<script>
				<!-- scroll navbar -->



				<!-- animasi tombol beli -->
				$('.beli').on('mouseenter', function(){
					$(this).addClass('animated rubberBand infinite');
				})

				$('.beli').on('mouseleave', function(){
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