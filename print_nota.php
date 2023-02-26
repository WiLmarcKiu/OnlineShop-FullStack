<?php include 'koneksi.php' ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Nota Pembelian</title>
<body>


 <!-- Nota -->


<h2 class="text-center">Nota Pembelian</h2><hr>	
<?php 
	$ambil= $koneksi->query("SELECT * FROM pembelian JOIN pelanggan 
		ON pembelian.id_pelanggan=pelanggan.id_pelanggan
		WHERE pembelian.id_pembelian='$_GET[id]'");
	$detail = $ambil->fetch_assoc();
?>


<h4>Pembelian</h4>
		No. Pembelian : <?php echo $detail ['id_pembelian']; ?><br>
		Tanggal : <?php echo $detail ['tanggal_pembelian']; ?><br>
		Total : Rp. <?php echo number_format($detail ['total_pembelian']); ?>
	
<h4>Pelanggan</h4>
		Nama : <?php echo $detail ['nama_pelanggan']; ?><br>
		Email : <?php echo $detail ['email_pelanggan']; ?><br>
		Telepon : <?php echo $detail ['telepon_pelanggan']; ?>
	
<h4>Pengiriman</h4>
		Kota : <?php echo $detail ['nama_kota']; ?><br>
		Alamat Pengiriman : <?php echo $detail ['alamat_pengiriman']; ?><br>
		Ongkos Kirim : Rp. <?php echo $detail ['tarif']; ?>

<h1></h1>

<table width="100%" border="1" cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Produk</th>
			<th>Harga</th>
			<th>Berat</th>
			<th>Jumlah</th>
			<th>Subberat</th>
			<th>Subtotal</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor = 1; ?>
		<?php 
		$ambil = $koneksi->query ("SELECT * FROM pembelian_produk WHERE id_pembelian ='$_GET[id]'"); ?>
		 <?php 
		 while ($pecah = $ambil->fetch_assoc()) { ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama']; ?></td>
			<td>Rp. <?php echo number_format($pecah['harga']); ?></td>
			<td><?php echo $pecah['berat']; ?> Gr</td>
			<td><?php echo $pecah['jumlah']; ?></td>
			<td><?php echo $pecah['subberat']; ?> Gr</td>
			<td>Rp. <?php echo number_format($pecah['subharga']); ?></td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>

			<p>Silahkan melakukan pembayaran sebesar Rp. <?php echo number_format($detail ['total_pembelian']); ?> ke
				<br>
				<strong>BANK BNI 0848230258 AN. Elma Rulfin Tiara Kiu</strong>
			</p>
 <!-- akhir nota -->

<script>
	window.print()
</script>
</body>
</html>