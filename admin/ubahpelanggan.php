<h2 class="text-center">Ubah Data Pelanggan</h2><hr>

<?php 
	$ambil= $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$_GET[id]'");
	$pecah = $ambil->fetch_assoc();

  ?>

 <form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama Pelanggan</label>
		<input type="text" class="form-control" name="nama" value="<?php echo $pecah ['nama_pelanggan']; ?>">
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="text" name="email" class="form-control" value="<?php echo $pecah ['email_pelanggan']; ?>">
	</div>
	<div class="form-group">
		<label>Telepon</label>
		<input type="number" class="form-control" name="telepon" value="<?php echo $pecah ['telepon_pelanggan']; ?>">
	</div>
	<div class="form-group">
		<label>Alamat</label>
		<input type="text" name="alamat" class="form-control" value="<?php echo $pecah ['alamat_pelanggan']; ?>">
	</div>
	<button class="btn btn-sm btn-primary" name="ubah"><i class="fa fa-check"></i>&nbsp;Ubah</button>
</form>

<?php 
	if (isset($_POST['ubah'])) 
	{
		$koneksi->query("UPDATE pelanggan SET nama_pelanggan = '$_POST[nama]',email_pelanggan = '$_POST[email]',telepon_pelanggan = '$_POST[telepon]',alamat_pelanggan = '$_POST[alamat]' WHERE id_pelanggan = '$_GET[id]'");


		echo "<script>alert('Data Berhasil Diubah');</script>";
		echo "<script>location='index.php?halaman=pelanggan';</script>";

	}
?>