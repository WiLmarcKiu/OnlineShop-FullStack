<h2 class="text-center">Data Pembayaran</h2><hr>

<?php 

// mendapatkan id_pembelian dari url
$id_pembelian = $_GET['id'];

// mengambil data pembayaran berdasarkan id_pembelian
$ambil = $koneksi->query("SELECT * FROM pembayaran WHERE id_pembelian = '$id_pembelian'");
$detail = $ambil->fetch_assoc();

 ?>

 <div class="row">
 	<div class="col-md-6">
 		<table class="table table-bordered">
	<thead>
		<tr>
			<th>Nama Penyetor</th>
			<td><?php echo $detail ['nama']; ?></td>
		</tr>
		<tr>
			<th>Bank</th>
			<td><?php echo $detail ['bank']; ?></td>
		</tr>
		<tr>
			<th>Jumlah</th>
			<td>Rp. <?php echo number_format($detail ['jumlah']); ?></td>
		</tr>
		<tr>
			<th>Tanggal</th>
			<td><?php echo date("d F Y", strtotime($detail ['tanggal'])); ?></td>
		</tr>
	</thead>
</table>
 	</div>
 	<div class="col-md-6">
 		<img src="../bukti_pembayaran/<?php echo $detail ['bukti']; ?>" class="img-responsive">
 	</div>
 </div>

 <form method="post">
 	<div class="form-group">
 		<label>No. Resi Pengiriman</label>
 		<input type="text" class="form-control" name="resi" required>
 	</div>
 	<div class="form-group">
 		<label>Status</label>
 		<select class="form-control" name="status" required>
 			<option value="">Pilih Status</option>
 			<option value="Batal">Batal</option>
 			<option value="Lunas">Lunas</option>
 			<option value="Barang Dikirim">Barang Dikirim</option>
 			<option value="Barang Sudah Sampai">Barang Sudah Sampai</option>
 		</select>
 	</div>
 	<button class="btn btn-sm btn-primary" name="proses"><i class="fa fa-check"></i>&nbsp;Proses</button>
 </form>

 <?php 
 	if (isset($_POST["proses"]))
 	{
 		$resi = $_POST["resi"];
 		$status = $_POST["status"];
 		$koneksi->query("UPDATE pembelian SET resi_pengiriman = '$resi',status_pembelian = '$status' WHERE id_pembelian = '$id_pembelian'");

 		echo "<script>alert('Data Pembelian Terupdate');</script>";
		echo "<script>location='index.php?halaman=pembelian';</script>";
 	}
  ?>

