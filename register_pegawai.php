<?php
    // include 'secure.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="Assets/style.css">
    <title>Form Design</title>
  </head>
  <body>
   <div class="container-fluid bg-primary text-light py-3">
       <header class="text-center">
           <h1 class="display-6">Formulir Pegawai</h1>
       </header>
   </div>
   <section class="container my-2 w-50 text-light p-2">
   <form action="proses_regist.php" method="post">
    <div class="col-12">
        <!-- <div>Not registred yet? </div>
        <a href="index.php" class="toggle">Sign up</a> -->
        </br>
        <label for="nama_pegawai" class="form-label text-dark">Nama</label>
        <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" placeholder="Nama"  required>
    </div>
    <div class="col-12">
        <label for="nik" class="form-label text-dark">NIK</label>
        <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukkan NIK" pattern="\d{16}" maxlength="16" required>
    </div>
    <div class="col-12">
        <label for="alamat" class="form-label text-dark">Alamat</label>
        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat"  required>
    </div>
        <div class="col-12">
          <label for="gender" class="form-label text-dark">Gender</label>
            <select name="gender" class="form-control" id="gender" required>
              <option value="">Pilih Gender</option>
              <option value="L">Laki-Laki</option>
              <option value="P">Perempuan</option>
            </select>
        </div>
        <div class=row>
          <div class="col-md-5">
            <label for="telp" class="form-label text-dark">Telp</label>
            <input type="tel" class="form-control" id="telp" name="telp" placeholder="1234-5678" required>
          </div>
          <div class="col-md-7">
          <label for="jabatan" class="form-label text-dark">Jabatan</label>
            <select name="id_jabatan" class="form-control" required>
              <option value="">Pilih Jabatan</option>
              <?php
              include "koneksi.php";
              $qry_jabatan=mysqli_query($conn,"SELECT * FROM jabatan");
              while($data_jabatan=mysqli_fetch_array($qry_jabatan)){
                  echo '<option value="'.$data_jabatan['id_jabatan'].'">'.$data_jabatan['nama_jabatan'].'</option>';    
              }
              ?>
            </select>
          </div>
        </div>
        <div class="col-12">
          <label for="username" class="form-label text-dark">Username</label>
          <input type="text" class="form-control" id="username" name="username" placeholder="username" required>
        </div>
        <div class="col-12">
          <label for="password" class="form-label text-dark">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="*****" required>
        </div>
        <div class="col-12">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck" name="terms" required>
            <label class="form-check-label" for="gridCheck">
              Check me out
            </label>
          </div>
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
   </section>
  </body>
</html>
