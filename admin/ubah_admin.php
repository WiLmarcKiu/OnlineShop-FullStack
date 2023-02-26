<h2 class="text-center">Ubah Data Admin</h2><hr>

<?php 
	$ambil= $koneksi->query("SELECT * FROM admin WHERE id_admin='$_GET[id]'");
	$pecah = $ambil->fetch_assoc();
?>


 <form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Username Admin</label>
		<input type="text" class="form-control" name="username" value="<?php echo $pecah ['username']; ?>">
	</div>
	<div class="form-group">
		<label>Password</label>
		<input type="text" name="password" class="form-control" value="<?php echo $pecah ['password']; ?>">
	</div>
	<div class="form-group">
		<label>Nama Lengkap</label>
		<input type="text" class="form-control" name="nama_lengkap" value="<?php echo $pecah ['nama_lengkap']; ?>">
	</div>
	<div class="form-group">
		<img src="../foto_admin/<?php echo $pecah ['foto_admin'] ?>" width="200">
	</div>
	<div class="form-group">
		<label>Ganti Foto</label>
		<input type="file" class="form-control" name="foto">
	</div>
	<button class="btn btn-sm btn-primary" name="ubah"><i class="fa fa-check"></i>&nbsp;Ubah</button>
</form>

<?php 
	if (isset($_POST['ubah'])) 
	{
		$namafoto=$_FILES['foto']['name'];
		$lokasifoto=$_FILES['foto']['tmp_name'];

// jika foto dirubah
		if(!empty($lokasifoto))
		{
			move_uploaded_file($lokasifoto, "../foto_admin/$namafoto");
			$koneksi->query("UPDATE admin SET username = '$_POST[username]',password = '$_POST[password]',nama_lengkap = '$_POST[nama_lengkap]',foto_admin = '$namafoto' WHERE id_admin = '$_GET[id]'");
		}
		else
		{
			move_uploaded_file($lokasifoto, "../foto_admin/$namafoto");
			$koneksi->query("UPDATE admin SET username = '$_POST[username]',password = '$_POST[password]',nama_lengkap = '$_POST[nama_lengkap]' WHERE id_admin = '$_GET[id]'");
		}


		echo "<script>alert('Data Admin Berhasil Diubah');</script>";
		echo "<script>alert('Silahkan Login Kembali');</script>";
		echo "<script>location='login.php';</script>";

	}
?>