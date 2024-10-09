 <?php
    include 'secure.php';
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    

  <title>AdminHub</title>
</head>
<body>
    <div class="container">
      <h3>Tampil Pegawai</h3>
      <table class="table table-hover table-striped">
          <thead>
              <tr>
                  <th>No</th>
                  <th>Nama Pegawai</th>
                  <th>NIK</th>
                  <th>Alamat</th>
                  <th>Gender</th>
                  <th>Username</th>
                  <th>Telp</th>
                  <th>Jabatan</th>
                  <th>AKSI</th>
              </tr>
          </thead>
          <tbody>
          <?php 
              include "koneksi.php";
              $qry_pegawai=mysqli_query($conn,"SELECT * FROM pegawai JOIN jabatan ON jabatan.id_jabatan=pegawai.id_jabatan");
              $no=0;
              while($dt_pegawai=mysqli_fetch_array($qry_pegawai)){
              $no++;?>
          <tr>
            <td><?= $no ?></td>
            <td><?= $dt_pegawai['nama_pegawai'] ?></td> 
            <td><?= $dt_pegawai['nik'] ?></td> 
            <td><?= $dt_pegawai['alamat'] ?></td>
            <td><?= $dt_pegawai['gender'] ?></td> 
            <td><?= $dt_pegawai['username'] ?></td> 
            <td><?= $dt_pegawai['telp'] ?></td> 
            <td><?= $dt_pegawai['nama_jabatan'] ?></td> 
            <td>
              <a href="ubah_pegawai.php?id_pegawai=<?= $dt_pegawai['id_pegawai'] ?>" class="btn btn-success">Ubah</a> | 
              <a href="hapus_pegawai.php?id_pegawai=<?= $dt_pegawai['id_pegawai'] ?>"
                onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a>
            </td>
          </tr>
          <?php 
          }
          ?>
          </tbody>
      </table>
      <a href="register_pegawai.php" class="btn btn-primary">Tambah Pegawai</a>
    </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	<script src="Assets/script.js"></script>
</body>
</html>



