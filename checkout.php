<?php 
session_start();

// echo "<pre>";
// print_r($_SESSION['keranjang']);
// echo "</pre>";

include 'koneksi.php';

// jika belum ada session pelanggan(belum login), maka dibawah ke login.php
if (!isset($_SESSION["pelanggan"])) 
{
	echo "<script>alert('Anda Belum Login');</script>";
	echo "<script>location='login.php';</script>";
}
if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])) 
{
	echo "<script>alert('Keranjang Kosong, Silahkan Belanja Terlebih Dahulu');</script>";
	echo "<script>location='index.php';</script>";
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


	<title>BEYOUTIFUL : Checkout</title>

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
			<h2 class="text-center" style="font-family:'Marvel', sans-serif; text-shadow:1px 1px 1px rgba(0,0,0,0.7);">Checkout</h2><hr>	
			
			<section>
				<div class="container change">
					<div class="row justify-content-center">
						<table class="table table-bordered table-hover">
							<thead class="table table-primary">
								<tr>
									<th>No</th>
									<th>Nama Produk</th>
									<th>Harga</th>
									<th>Jumlah</th>
									<th>Sub Harga</th>
								</tr>
							</thead>
							<tbody>
								<?php $nomor = 1; ?>
								<?php $totalbelanja = 0; ?>
								<?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
									<?php $ambil=$koneksi->query("SELECT * FROM produk WHERE id_produk = 
										'$id_produk'"); 
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
									</tr>
									<?php $nomor++; ?>
									<?php $totalbelanja += $subharga; ?>
								<?php endforeach ?>
							</tbody>
							<tfoot>
								<tr class="table table-danger">
									<th colspan="4">Total Belanja</th>
									<th>Rp. <?php echo number_format($totalbelanja); ?></th>
								</tr>
							</tfoot>
						</table>
					</div>
					</div>

					<form method="post">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<input type="text" readonly value="<?php echo($_SESSION["pelanggan"]
									['nama_pelanggan']) ?>" class="form-control">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<input type="text" readonly value="<?php echo($_SESSION["pelanggan"]
									['telepon_pelanggan']) ?>" class="form-control">
								</div>
							</div>
							<div class="col-md-4">
								<select class="form-control" name="id_ongkir" required>
									<option value="">Pilih Ongkos Kirim</option>

									<?php 
									$ambil = $koneksi->query("SELECT * FROM ongkir");
									while ($perongkir = $ambil->fetch_assoc()) {
										?>

										<option value="<?php echo($perongkir["id_ongkir"]) ?>">
											<?php echo $perongkir['nama_kota'] ?> -
											Rp. <?php echo number_format($perongkir['tarif']) ?>
										</option>
									<?php } ?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label>Alamat Lengkap Pengiriman</label>
							<textarea class="form-control" name="alamat_pengiriman" placeholder="Masukan Akamat Lengkap Pengiriman (beserta kode pos)" required autocomplete="off"></textarea>
						</div>


						<button id="checkout" class="btn btn-sm btn-primary" name="checkout"><i class="fa fa-check"></i>&nbsp;Checkout</button>
					</form>

					<?php 
					if (isset($_POST["checkout"])) 
					{
						$id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
						$id_ongkir = $_POST["id_ongkir"];
						$tanggal_pembelian = date("Y-m-d");
						$alamat_pengiriman = $_POST["alamat_pengiriman"];

						$ambil = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir = '$id_ongkir'");
						$arrayongkir = $ambil->fetch_assoc();
						$nama_kota = $arrayongkir['nama_kota'];
						$tarif = $arrayongkir['tarif'];

						$total_pembelian = $totalbelanja + $tarif;

							// 1. menyimpan data ke tabel pembelian 
						$koneksi->query("INSERT INTO pembelian (id_pelanggan,id_ongkir,tanggal_pembelian,total_pembelian,nama_kota,tarif,alamat_pengiriman) VALUES ('$id_pelanggan','$id_ongkir','$tanggal_pembelian','$total_pembelian','$nama_kota','$tarif','$alamat_pengiriman')");

							// mendapatkan id_pembelian yang barusan terjadi
						$id_pembelian_barusan = $koneksi->insert_id;
						foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) 
						{

								// mendapatkan data produk berdasarkan id_produk
							$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
							$perproduk = $ambil->fetch_assoc();

							$nama = $perproduk['nama_produk'];
							$harga = $perproduk['harga_produk'];
							$berat = $perproduk['berat_produk'];

							$subberat = $perproduk['berat_produk']*$jumlah;
							$subharga = $perproduk['harga_produk']*$jumlah;

							$koneksi->query("INSERT INTO pembelian_produk (id_pembelian,id_produk,jumlah,nama,harga,berat,subberat,subharga) VALUES
								('$id_pembelian_barusan','$id_produk','$jumlah','$nama','$harga','$berat','$subberat','$subharga')");


							// skript update stok
							$koneksi->query("UPDATE produk SET stok_produk = stok_produk - $jumlah WHERE id_produk = 
								'$id_produk'");


						}

							// mengkosongkan keranjang belanja
						unset($_SESSION["keranjang"]);

							// tampilan dialihkan ke halaman nota, nota dari pembelian yang barusan
						echo "<script>alert('Pembelian Sukses');</script>";
						echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";
					}
					?>

				</div>
			</section>

			<!-- akhir keranjang -->


			<!--- JS galeri --->

			<script type="text/javascript" src="swiper.min.js"></script>
			<script src="https:cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
			<script src="parallaxie.js-master/parallaxie.js"></script>

			<script>
				<!-- scroll navbar -->



				<!-- animasi watch video -->
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