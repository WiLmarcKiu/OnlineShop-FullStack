<h2 class="text-center">Tambah Data Ongkir</h2><hr>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama Kota</label>
		<input type="text" class="form-control" name="nama" required>
	</div>
	<div class="form-group">
		<label>Tarif (Rp)</label>
		<input type="number" class="form-control" name="tarif" required>
	</div>
	<button class="btn btn-sm btn-primary" name="save"><i class="fa fa-check"></i>&nbsp;Simpan</button>
</form>

<?php 
	if (isset($_POST['save']))
	{
		$koneksi->query ("INSERT INTO ongkir
		(nama_kota,tarif) VALUES ('$_POST[nama]','$_POST[tarif]')");

		echo "<script>alert('Data Berhasil Ditambah');</script>";
		echo "<script>location='index.php?halaman=ongkir';</script>";
	}
 ?>