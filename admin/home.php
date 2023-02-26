<?php 
//koneksi ke database
include '../koneksi.php';

// echo "<pre>";
//  print_r($_SESSION);
//  echo "</pre>";

 ?>

<?php 
        // mendapatkan id_admin yang login
    $id_admin = $_SESSION["admin"]["id_admin"];

    $ambil = $koneksi->query ("SELECT * FROM admin WHERE id_admin ='$id_admin'");
     $pecah = $ambil->fetch_assoc();
?>
<h3 class="text-center">Selamat datang <u><?php echo $_SESSION["admin"]["nama_lengkap"] ?></u></h3><hr>

<div class="row">
    <div class="col-md-9">
 <table class="table table-bordered">
    <thead>
        <tr>
            <th>Username Admin</th>
            <td><?php echo $pecah["username"]; ?></td>
        </tr>
        <tr>
            <th>Password</th>
            <td><?php echo $pecah["password"]; ?></td>
        </tr>
        <tr>
            <th>Nama Lengkap</th>
            <td><?php echo $pecah["nama_lengkap"]; ?></td>
        </tr>
    </thead>
</table>
<a href="index.php?halaman=ubah_admin&id=<?php echo $pecah ['id_admin']; ?>" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i>&nbsp;Ubah</a>
    </div>

    <div class="col-md-3">
        <img src="../foto_admin/<?php echo $pecah ['foto_admin']; ?>" class="img-responsive">
    </div>
</div>
