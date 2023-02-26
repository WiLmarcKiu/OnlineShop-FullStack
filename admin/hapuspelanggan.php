<h2>Hapus Data Pelanggan</h2>

<?php 
	$ambil= $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$_GET[id]'");
	$pecah = $ambil->fetch_assoc();

	$koneksi->query("DELETE FROM pelanggan WHERE id_pelanggan='$_GET[id]'");
	echo "<script>alert('Data Telah Dihapus');</script>";
	echo "<script>location='index.php?halaman=pelanggan';</script>";
?>