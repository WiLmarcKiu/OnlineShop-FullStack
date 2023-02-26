<?php
$semuadata = array(); 
$tgl_mulai='';
$tgl_selesai='';
if (isset($_POST["kirim"]))
{
	$tgl_mulai = $_POST["tglm"];
	$tgl_selesai = $_POST["tgls"];
	$status = $_POST["status"];
	$ambil = $koneksi->query("SELECT * FROM pembelian pm LEFT JOIN pelanggan pl ON 
		pm.id_pelanggan=pl.id_pelanggan WHERE status_pembelian = '$status' AND tanggal_pembelian BETWEEN '$tgl_mulai' AND '$tgl_selesai'");
	while($pecah = $ambil->fetch_assoc())
	{
		$semuadata[] = $pecah;
	}
}
 ?>

<h2 class="text-center">Laporan Pembelian dari <?php echo date("d F Y", strtotime($tgl_mulai)) ?> - <?php echo date("d F Y", strtotime($tgl_selesai)) ?></h2><hr>

<form method="post">
	<div class="row">
		<dov class="col-md-3">
			<div class="form-group">
				<label>Tanggal Mulai</label>
				<input type="date" class="form-control" name="tglm" value="<?php echo $tgl_mulai ?>">
			</div>
		</dov>
		<dov class="col-md-3">
			<div class="form-group">
				<label>Tanggal Selesai</label>
				<input type="date" class="form-control" name="tgls" value="<?php echo $tgl_selesai ?>">
			</div>
		</dov>
		<dov class="col-md-3">
			<div class="form-group">
				<label>Status</label>
				<select class="form-control" name="status" required>
					<option value="">Pilih Status</option>
					<option value="Pending" <?php echo $status=="Pending"?"selected":""; ?>>Pending</option>
					<option value="Sudah Kirim Pembayaran" <?php echo $status=="Sudah Kirim Pembayaran"?"selected":""; ?>>Sudah Kirim Pembayaran</option>
 					<option value="Batal"  <?php echo $status=="Batal"?"selected":""; ?>>Batal</option>
 					<option value="Lunas"  <?php echo $status=="Lunas"?"selected":""; ?>>Lunas</option>
 					<option value="Barang Dikirim"  <?php echo $status=="Barang Dikirim"?"selected":""; ?>>Barang Dikirim</option>
 					<option value="Barang Sudah Sampai"  <?php echo $status=="Barang Sudah Sampai"?"selected":""; ?>>Barang Sudah Sampai</option>
				</select>
			</div>
		</dov>
		<dov class="col-md-2">
			<label>&nbsp;</label><br>
			<button class="btn btn-primary" name="kirim"><i class="fa fa-eye"></i>&nbsp;Lihat</button>
		</dov>
	</div>
</form>

<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>No</th>
			<th>Pelanggan</th>
			<th>Tanggal</th>
			<th>Jumlah</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		<?php $total=0; ?>
		<?php foreach ($semuadata as $key => $value): ?>
		<?php $total+=$value["total_pembelian"] ?>

		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $value["nama_pelanggan"] ?></td>
			<td><?php echo date("d F Y", strtotime($value ['tanggal_pembelian'])); ?></td>
			<td>Rp. <?php echo number_format($value["total_pembelian"]) ?></td>
			<td><?php echo $value["status_pembelian"] ?></td>
		</tr>
		<?php endforeach ?>
	</tbody>
	<tfoot>
		<tr>
			<th colspan="3">Total</th>
			<th>Rp. <?php echo number_format($total); ?></th>
			<th></th>
		</tr>
	</tfoot>
</table>