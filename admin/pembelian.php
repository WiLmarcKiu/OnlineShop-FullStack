<h2 class="text-center">Data Pembelian</h2><hr>

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
			<th>Tanggal</th>
			<th>Status Pembelian</th>
			<th>Total</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor = 1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan"); ?>
		<?php 
		 //tombol pencarian 		
		
		if (isset($_POST['cari'])) {
			$keyword = $_POST["keyword"];
			$ambil=$koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE 
				nama_pelanggan LIKE '%$keyword%' OR
				tanggal_pembelian LIKE '%$keyword%' OR
				status_pembelian LIKE '%$keyword%' OR
				total_pembelian LIKE '%$keyword%' ");
		}
		//akhir tombol pencarian
		 ?>
		<?php while ($pecah = $ambil->fetch_assoc()) { ?>
		
		
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah ['nama_pelanggan']; ?></td>
			<td><?php echo date("d F Y", strtotime($pecah ['tanggal_pembelian'])); ?></td>
			<td><?php echo $pecah ['status_pembelian']; ?></td>
			<td>Rp. <?php echo number_format($pecah ['total_pembelian']); ?></td>
			<td>
				<a href="index.php?halaman=detail&id= <?php echo $pecah ['id_pembelian'] ;?>" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i>&nbsp;Detail</a>&nbsp;

			<?php if ($pecah['status_pembelian']!=="Pending"):?>
			
				<a href="index.php?halaman=pembayaran&id= <?php echo $pecah ['id_pembelian']?>" class="btn btn-sm btn-warning"><i class="fa fa-usd"></i>&nbsp;Pembayaran</a> 
			<?php endif ?>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>