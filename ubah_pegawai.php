<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Form Design</title>
  </head>
  <body>
  <?php
        include "koneksi.php";
        $id_pegawai = $_GET['id_pegawai'];
        $qry_get_pegawai = mysqli_query($conn, "SELECT * FROM pegawai WHERE id_pegawai = '$id_pegawai'");
        $dt_pegawai = mysqli_fetch_array($qry_get_pegawai);
   ?>
   <div class="container-fluid bg-primary text-light py-3">
       <header class="text-center">
           <h1 class="display-6">Ubah Data Pegawai</h1>
       </header>
   </div>
   <section class="container my-2 bg-dark w-50 text-light p-3">
    <form action="proses_ubah_pegawai.php" class="row g-3" method="post">
        <div class="col-12">
        <input type="hidden" name="id_pegawai" value="<?= $id_pegawai ?>">
    
    <div class="col-12">
        <label for="nama_pegawai" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" placeholder="Nama" value="<?= $dt_pegawai['nama_pegawai'] ?>" required>
    </div>
    <div class="col-12">
        <label for="nik" class="form-label">NIK</label>
        <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukkan NIK" pattern="\d{16}" maxlength="16" value="<?= $dt_pegawai['nik'] ?>" required>
    </div>
        <div class="col-12">
          <label for="alamat" class="form-label">Alamat</label>
          <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="<?= $dt_pegawai['alamat'] ?>"required>
        </div>
        <div class="col-12">
              <label for="gender" class="form-label">Gender</label>
              <select name="gender" class="form-control" id="gender" required>
                  <option value="">Pilih Gender</option>
                  <?php
                      $arr_gender = array('L' => 'Laki-laki', 'P' => 'Perempuan');
                      foreach ($arr_gender as $key_gender => $val_gender) {
                          $selected = ($key_gender == $dt_pegawai['gender']) ? 'selected' : '';
                          echo '<option value="' . $key_gender . '" ' . $selected . '>' . $val_gender . '</option>';
                      }
                  ?>
              </select>
          </div>

        <div class="col-md-6">
          <label for="telp" class="form-label">Telp</label>
          <input type="tel" class="form-control" id="telp" name="telp" placeholder="1234-5678" value="<?= $dt_pegawai['telp'] ?>" required>
        </div>
        <div class="col-md-6">
          <label for="jabatan" class="form-label">Jabatan</label>
          <select name="id_jabatan" class="form-control" id="jabatan" required>
              <option value="">Pilih jabatan</option>
              <?php
                  $qry_jabatan = mysqli_query($conn, "SELECT * FROM jabatan");
                  while ($dt_jabatan = mysqli_fetch_array($qry_jabatan)) {
                      $selected = ($dt_jabatan['id_jabatan'] == $dt_pegawai['id_jabatan']) ? 'selected' : '';
                      echo '<option value="' . $dt_jabatan['id_jabatan'] . '" ' . $selected . '>' . $dt_jabatan['nama_jabatan'] . '</option>';
              }
              ?>
          </select>
       </div>
       <div class="col-12">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" id="username" name="username" placeholder="jamet"  value="<?= $dt_pegawai['username'] ?>" required>
        </div>
        <div class="col-12">
          <label for="password" class="form-label">Password</label>
          <input type="text" class="form-control" id="password" name="password" placeholder="*****" >
        </div>
        <div class="col-12">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="terms" name="terms" >
            <label class="form-check-label" for="terms">
              I agree to the terms and conditions
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
