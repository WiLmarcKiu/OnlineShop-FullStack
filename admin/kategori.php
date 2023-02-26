<h2 class="text-center">Data Kategori</h2><hr>

<div class="row text-center">
			<form action="" method="post">
					<input type="text" name="keyword" size="50" autofocus placeholder=" Masukan kata kunci pencarian" autocomplete="off" style="height:29px; padding-bottom:5px;">&nbsp;
					<button type="submit" class="btn btn-sm btn-danger" name="cari"><i class="fa fa-search"></i></button>
			</form>							
</div>
<br>

<?php 

$semuadata =array();
$ambil=$koneksi->query("SELECT * FROM kategori");

        //tombol pencarian 		
		
		if (isset($_POST['cari'])) {
			$keyword = $_POST["keyword"];
			$ambil=$koneksi->query("SELECT * FROM kategori WHERE 
				nama_kategori LIKE '%$keyword%'");
		}
		//akhir tombol pencarian

while ($tiap = $ambil->fetch_assoc()) 
{ 
	$semuadata[] = $tiap;
}
 ?>
<a href="index.php?halaman=tambahkategori" class="btn btn-sm btn-success"><i class="fa fa-plus" data-toggle="tooltip" title="Tambah Data"></i></a>
 <br><br>
<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($semuadata as $key => $value): ?>

		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $value ['nama_kategori']; ?></td>
			<td>
				<a href="index.php?halaman=ubahkategori&id=<?php echo $value ['id_kategori']; ?>" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i>&nbsp;Ubah</a>&nbsp;
				<a href="index.php?halaman=hapuskategori&id=<?php echo $value ['id_kategori']; ?>" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i>&nbsp;Hapus</a>
			</td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>
