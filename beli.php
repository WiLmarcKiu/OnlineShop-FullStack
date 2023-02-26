<?php 
session_start();
// mendapatkan id produk

$id_produk = $_GET['id'];
// jk sudah ada produk itu di keranjang mk, jumlah +1
	if (isset($_SESSION['keranjang'][$id_produk]))
	{
		$_SESSION['keranjang'][$id_produk] += 1;
	}
	// selain itu/ belum ada di keranjang mk, itu dianggap dibeli 1
	else 
	{
		$_SESSION['keranjang'][$id_produk] = 1;
	}

	//echo "<pre>";
	//print_r($_SESSION);
	//echo "<pre>";

	// larikan ke halaman keranjang
	echo "<script>alert('Produk telah masuk ke keranjang belanja');</script>";
	echo "<script>location='keranjang.php?halaman=keranjang';</script>";
 ?>