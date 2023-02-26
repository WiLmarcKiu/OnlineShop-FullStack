<h2 class="text-center">Data Produk</h2><hr>

<div class="row text-center">
			<form action="" method="post">
					<input type="text" name="keyword" size="50" autofocus placeholder=" Masukan kata kunci pencarian" autocomplete="off" style="height:29px; padding-bottom:5px;">&nbsp;
					<button type="submit" class="btn btn-sm btn-danger" name="cari"><i class="fa fa-search"></i></button>
			</form>							
</div>

<a href="index.php?halaman=tambahproduk" class="btn btn-sm btn-success"><i class="fa fa-plus" data-toggle="tooltip" title="Tambah Data"></i></a>
<br><br>
<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>No</th>
			<th>Kategori</th>
			<th>Nama</th>
			<th>Harga</th>
			<th>Berat</th>
			<th>Stok</th>
			<th>Deskripsi</th>
			<th>Foto</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>

		<?php $nomor = 1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM produk LEFT JOIN kategori ON produk.id_kategori=kategori.id_kategori"); ?>

		<?php 
		 //tombol pencarian 		
		
		if (isset($_POST['cari'])) {
			$keyword = $_POST["keyword"];
			$ambil=$koneksi->query("SELECT * FROM produk LEFT JOIN kategori ON produk.id_kategori=kategori.id_kategori WHERE 
				nama_kategori LIKE '%$keyword%' OR
				nama_produk LIKE '%$keyword%' OR
				harga_produk LIKE '%$keyword%' OR
				berat_produk LIKE '%$keyword%' OR
				stok_produk LIKE '%$keyword%' OR
				deskripsi_produk LIKE '%$keyword%'");
		}
		//akhir tombol pencarian
		 ?>

		<?php while ($pecah = $ambil->fetch_assoc()) { ?>
		
		
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah ['nama_kategori']; ?></td>
			<td><?php echo $pecah ['nama_produk']; ?></td>
			<td>Rp. <?php echo number_format($pecah ['harga_produk']); ?></td>
			<td><?php echo $pecah ['berat_produk']; ?> Gr</td>
			<td><?php echo $pecah ['stok_produk']; ?></td>
			<td><?php echo $pecah ['deskripsi_produk']; ?></td>
			<td>
				<img src="../foto_produk/<?php echo $pecah ['foto_produk']; ?>" width="100">
			</td>
			<td>
				<a href="index.php?halaman=ubahproduk&id=<?php echo $pecah ['id_produk']; ?>" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i>&nbsp;Ubah</a><br><br>
				<a href="index.php?halaman=hapusproduk&id=<?php echo $pecah ['id_produk']; ?>" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i>&nbsp;Hapus</a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>

			
