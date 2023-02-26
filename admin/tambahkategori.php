<h2 class="text-center">Tambah Data Kategori</h2><hr>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama Kategori</label>
		<input type="text" class="form-control" name="nama" required>
	</div>
	<button class="btn btn-sm btn-primary" name="save"><i class="fa fa-check"></i>&nbsp;Simpan</button>
</form>

<?php 
	if (isset($_POST['save']))
	{
		$koneksi->query ("INSERT INTO kategori
		(nama_kategori) VALUES ('$_POST[nama]')");

		echo "<script>alert('Data Berhasil Ditambah');</script>";
		echo "<script>location='index.php?halaman=kategori';</script>";
	}
 ?>