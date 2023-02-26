<h2 class="text-center">Data Pelanggan</h2><hr>

	<div class="row text-center">
			<form action="" method="post">
					<input type="text" name="keyword" size="50" autofocus placeholder=" Masukan kata kunci pencarian" autocomplete="off" style="height:29px; padding-bottom:5px;">&nbsp;
					<button type="submit" class="btn btn-sm btn-danger" name="cari"><i class="fa fa-search"></i></button>
			</form>							
	</div>
<br>
<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Pelanggan</th>
			<th>Email</th>
			<th>Telepon</th>
			<th>Alamat</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>

		<?php $nomor = 1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM pelanggan"); ?>

		<!-- tombol pencarian -->
		<?php 
		if (isset($_POST['cari'])) {
			$keyword = $_POST["keyword"];
			$ambil=$koneksi->query("SELECT * FROM pelanggan WHERE 
				nama_pelanggan LIKE '%$keyword%' OR
				email_pelanggan LIKE '%$keyword%' OR
				telepon_pelanggan LIKE '%$keyword%' OR
				alamat_pelanggan LIKE '%$keyword%'");
		}
		 ?>
		<!-- akhir tombol pencarian -->

		<?php while ($pecah = $ambil->fetch_assoc()) { ?>

			<tr>
				<td><?php echo $nomor; ?></td>
				<td><?php echo $pecah ['nama_pelanggan']; ?></td>
				<td><?php echo $pecah ['email_pelanggan']; ?></td>
				<td><?php echo $pecah ['telepon_pelanggan']; ?></td>
				<td><?php echo $pecah ['alamat_pelanggan']; ?></td>
				<td>
					<a href="index.php?halaman=ubahpelanggan&id=<?php echo $pecah ['id_pelanggan']; ?>" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i>&nbsp;Ubah</a>&nbsp;
					<a href="index.php?halaman=hapuspelanggan&id=<?php echo $pecah ['id_pelanggan']; ?>" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i>&nbsp;Hapus</a>
				</td>
			</tr>
			<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>