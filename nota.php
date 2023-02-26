<?php
session_start();

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


	<title>BEYOUTIFUL : Nota Pembelian</title>

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

	<div class="container">
		<br><br><br><br>
		<h2 class="text-center">Nota Pembelian</h2>
		<hr>

		<?php
		$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan 
		ON pembelian.id_pelanggan=pelanggan.id_pelanggan
		WHERE pembelian.id_pembelian='$_GET[id]'");
		$detail = $ambil->fetch_assoc();
		?>


		<!-- jika pelanggan yang beli tidak sama dengan pelanggan yang login ,maka dilarikan ke riwayat.php karena tidak berhak melihat nota orang lain  -->
		<!-- pelanggan yang beli harus pelanggan yang login -->
		<?php

		// mendapatkan id_pelanggan yang beli
		$idpelangganyangbeli = $detail["id_pelanggan"];

		// mendapatkan id_pelanggan yang login
		$idpelangganyanglogin = $_SESSION["pelanggan"]["id_pelanggan"];

		if ($idpelangganyangbeli !== $idpelangganyanglogin) {
			echo "<script>alert('Jangan Sembarang!!!');</script>";
			echo "<script>location='riwayat.php';</script>";
			exit();
		}

		?>



		<div class="row">
			<div class="col-md-4 alert alert-info">
				<h4>Pembelian</h4>
				<strong>No. Pembelian : <?php echo $detail['id_pembelian']; ?></strong>
				<p>
					Tanggal : <?php echo $detail['tanggal_pembelian']; ?><br>
					Total : Rp. <?php echo number_format($detail['total_pembelian']); ?>
				</p>
			</div>
			<div class="col-md-4 alert alert-info">
				<h4>Pelanggan</h4>
				<strong>Nama : <?php echo $detail['nama_pelanggan']; ?></strong>
				<p>
					Email : <?php echo $detail['email_pelanggan']; ?><br>
					Telepon : <?php echo $detail['telepon_pelanggan']; ?>
				</p>
			</div>
			<div class="col-md-4 alert alert-info">
				<h4>Pengiriman</h4>
				<strong>Kota : <?php echo $detail['nama_kota']; ?></strong><br>
				Alamat Pengiriman : <?php echo $detail['alamat_pengiriman']; ?><br>
				Ongkos Kirim : Rp. <?php echo $detail['tarif']; ?>
			</div>
		</div>



		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Produk</th>
					<th>Harga</th>
					<th>Berat</th>
					<th>Jumlah</th>
					<th>Subberat</th>
					<th>Subtotal</th>
				</tr>
			</thead>
			<tbody>
				<?php $nomor = 1; ?>
				<?php
				$ambil = $koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian ='$_GET[id]'"); ?>
				<?php
				while ($pecah = $ambil->fetch_assoc()) { ?>
					<tr>
						<td><?php echo $nomor; ?></td>
						<td><?php echo $pecah['nama']; ?></td>
						<td>Rp. <?php echo number_format($pecah['harga']); ?></td>
						<td><?php echo $pecah['berat']; ?> Gr</td>
						<td><?php echo $pecah['jumlah']; ?></td>
						<td><?php echo $pecah['subberat']; ?> Gr</td>
						<td>Rp. <?php echo number_format($pecah['subharga']); ?></td>
					</tr>
					<?php $nomor++; ?>
				<?php } ?>
			</tbody>
		</table>

		<div class="row">
			<div class="col-md-7">
				<div class="alert alert-danger">
					<p>Silahkan melakukan pembayaran sebesar Rp. <?php echo number_format($detail['total_pembelian']); ?> ke
						<br>
						<strong>BANK BNI 0848230258 AN. Elma Rulfin Tiara Kiu</strong>
					</p>
				</div>
			</div>
		</div>

		<a href="nota_pdf.php?id=<?php echo $detail['id_pembelian']; ?>" class="btn btn-sm btn-primary"><i class="fa fa-download"></i>&nbsp;Download Nota</a>
		<a href="print_nota.php?id=<?php echo $detail['id_pembelian']; ?>" class="btn btn-sm btn-primary"><i class="fa fa-print"></i>&nbsp;Print Nota</a>

	</div>
</body>

</html>