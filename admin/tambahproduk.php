<?php 

$datakategori =array();
$ambil=$koneksi->query("SELECT * FROM kategori");
while ($tiap = $ambil->fetch_assoc()) 
{ 
	$datakategori[] = $tiap;
}
 ?>

<h2 class="text-center">Tambah Data Produk</h2><hr>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Kategori</label>
		<select class="form-control" name="id_kategori" required>
			<option value="">Pilih Kategori</option>

			<?php foreach ($datakategori as $key => $value): ?>
			<option value="<?php echo $value["id_kategori"]; ?>"><?php echo $value["nama_kategori"]; ?></option>
			<?php endforeach ?>

		</select>
	</div>
	<div class="form-group">
		<label>Nama</label>
		<input type="text" class="form-control" name="nama" required>
	</div>
	<div class="form-group">
		<label>Harga (Rp)</label>
		<input type="number" class="form-control" name="harga" required>
	</div>
	<div class="form-group">
		<label>Berat (Gr)</label>
		<input type="number" class="form-control" name="berat" required>
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea class="form-control" name="deskripsi" rows="10" required></textarea>
	</div>
	<div class="form-group">
		<label>Foto</label>
		<input type="file" class="form-control" name="foto" required>
	</div>
	<button class="btn btn-sm btn-primary" name="save"><i class="fa fa-check"></i>&nbsp;Simpan</button>
</form>

<?php 
	if (isset($_POST['save']))
	{
		$nama = $_FILES ['foto']['name'];
		$lokasi = $_FILES ['foto']['tmp_name'];
		move_uploaded_file($lokasi, "../foto_produk/".$nama);
		$koneksi->query ("INSERT INTO produk
		(id_kategori,nama_produk,harga_produk,berat_produk,deskripsi_produk,foto_produk)
		VALUES ('$_POST[id_kategori]','$_POST[nama]','$_POST[harga]','$_POST[berat]','$_POST[deskripsi]','$nama')");

		echo "<script>alert('Data Berhasil Ditambah');</script>";
		echo "<script>location='index.php?halaman=produk';</script>";
	}
 ?>