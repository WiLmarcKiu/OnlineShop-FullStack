<h2 class="text-center">Detail Pembelian</h2><hr>

<?php 
	$ambil= $koneksi->query("SELECT * FROM pembelian JOIN pelanggan 
		ON pembelian.id_pelanggan=pelanggan.id_pelanggan
		WHERE pembelian.id_pembelian='$_GET[id]'");
	$detail = $ambil->fetch_assoc();
?>

<div class="row">
	<div class="col-md-4">
		<h4>Pembelian</h4>
		<strong>No. Pembelian : <?php echo $detail ['id_pembelian']; ?></strong><br>
			Tanggal : <?php echo date("d F Y", strtotime($detail ['tanggal_pembelian'])); ?><br>
			Total : Rp. <?php echo number_format($detail ['total_pembelian']); ?><br>
			Status : <?php echo $detail ['status_pembelian']; ?>
	</div>
	<div class="col-md-4">
		<h4>Pelanggan</h4>
		<strong>Nama : <?php echo $detail ['nama_pelanggan']; ?></strong><br>
			Email : <?php echo $detail ['email_pelanggan']; ?><br>
			Telepon : <?php echo $detail ['telepon_pelanggan']; ?>
	</div>
	<div class="col-md-4">
		<h4>Pengiriman</h4>
		<strong>Kota : <?php echo $detail ['nama_kota']; ?></strong><br>
		Alamat Pengiriman : <?php echo $detail ['alamat_pengiriman']; ?><br>
		Ongkos Kirim : Rp. <?php echo $detail ['tarif']; ?>
	</div>
</div>
<br>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Produk</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Subtotal</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor = 1; ?>
		<?php 
		$ambil = $koneksi->query ("SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk = produk.id_produk WHERE pembelian_produk.id_pembelian ='$_GET[id]'"); ?>
		 <?php 
		 while ($pecah = $ambil->fetch_assoc()) { ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_produk']; ?></td>
			<td>Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
			<td><?php echo $pecah['jumlah']; ?></td>
			<td>Rp. <?php echo number_format($pecah['harga_produk'] * $pecah['jumlah']); ?></td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>