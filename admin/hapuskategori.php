<h2>Halaman Hapus Kategori</h2>

<?php 
	$ambil= $koneksi->query("SELECT * FROM kategori WHERE id_kategori='$_GET[id]'");
	$pecah = $ambil->fetch_assoc();


	$koneksi->query("DELETE FROM kategori WHERE id_kategori='$_GET[id]'");
	echo "<script>alert('Data Telah Dihapus');</script>";
	echo "<script>location='index.php?halaman=kategori';</script>";
?>