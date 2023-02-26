<h2 class="text-center">Data Ongkir</h2><hr>

<div class="row text-center">
			<form action="" method="post">
					<input type="text" name="keyword" size="50" autofocus placeholder=" Masukan kata kunci pencarian" autocomplete="off" style="height:29px; padding-bottom:5px;">&nbsp;
					<button type="submit" class="btn btn-sm btn-danger" name="cari"><i class="fa fa-search"></i></button>
			</form>							
</div>

<a href="index.php?halaman=tambahongkir" class="btn btn-sm btn-success"><i class="fa fa-plus" data-toggle="tooltip" title="Tambah Data"></i></a>
<br><br>
<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Kota</th>
			<th>Tarif</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>

		<?php $nomor = 1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM ongkir"); ?>
		<!-- tombol pencarian -->
		<?php 
		if (isset($_POST['cari'])) {
			$keyword = $_POST["keyword"];
			$ambil=$koneksi->query("SELECT * FROM ongkir WHERE 
				nama_kota LIKE '%$keyword%' OR
				tarif LIKE '%$keyword%'");
		}
		 ?>
		<!-- akhir tombol pencarian -->
		<?php while ($pecah = $ambil->fetch_assoc()) { ?>
		
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah ['nama_kota']; ?></td>
			<td><?php echo $pecah ['tarif']; ?></td>
			<td>
				<a href="index.php?halaman=ubahongkir&id=<?php echo $pecah ['id_ongkir']; ?>" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i>&nbsp;Ubah</a>&nbsp;
				<a href="index.php?halaman=hapusongkir&id=<?php echo $pecah ['id_ongkir']; ?>" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i>&nbsp;Hapus</a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>
