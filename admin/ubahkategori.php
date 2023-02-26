<h2 class="text-center">Ubah Data Kategori</h2><hr>

<?php 
	$ambil= $koneksi->query("SELECT * FROM kategori WHERE id_kategori='$_GET[id]'");
	$pecah = $ambil->fetch_assoc();
  ?>

 <form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama Kategori</label>
		<input type="text" class="form-control" name="nama" value="<?php echo $pecah ['nama_kategori']; ?>">
	</div>
	<button class="btn btn-sm btn-primary" name="ubah"><i class="fa fa-check"></i>&nbsp;Ubah</button>
</form>

<?php 
	if (isset($_POST['ubah'])) 
	{
		$koneksi->query("UPDATE kategori SET nama_kategori = '$_POST[nama]' WHERE id_kategori = '$_GET[id]'");


		echo "<script>alert('Data Berhasil Diubah');</script>";
		echo "<script>location='index.php?halaman=kategori';</script>";

	}
?>