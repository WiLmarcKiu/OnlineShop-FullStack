<h2 class="text-center">Ubah Data Ongkir</h2><hr>

<?php 
	$ambil= $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir='$_GET[id]'");
	$pecah = $ambil->fetch_assoc();
  ?>

 <form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama Kota</label>
		<input type="text" class="form-control" name="nama" value="<?php echo $pecah ['nama_kota']; ?>">
	</div>
	<div class="form-group">
		<label>Tarif</label>
		<input type="number" class="form-control" name="tarif" value="<?php echo $pecah ['tarif']; ?>">
	</div>
	<button class="btn btn-sm btn-primary" name="ubah"><i class="fa fa-check"></i>&nbsp;Ubah</button>
</form>

<?php 
	if (isset($_POST['ubah'])) 
	{
		$koneksi->query("UPDATE ongkir SET nama_kota = '$_POST[nama]',tarif = '$_POST[tarif]' WHERE id_ongkir = '$_GET[id]'");


		echo "<script>alert('Data Berhasil Diubah');</script>";
		echo "<script>location='index.php?halaman=ongkir';</script>";

	}
?>