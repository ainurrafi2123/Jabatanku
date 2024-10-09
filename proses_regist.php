<?php
if ($_POST) {
    $nama_pegawai = $_POST['nama_pegawai'];
    $nik = $_POST['nik'];
    $alamat = $_POST['alamat'];
    $gender = $_POST['gender'];
    $telp = $_POST['telp'];
    $id_jabatan = $_POST['id_jabatan'];
    $username = $_POST['username'];
    $password = $_POST['password']; // Password tanpa hash

    // Validasi input
    if (empty($nama_pegawai)) {
        echo "<script>alert('Nama pegawai tidak boleh kosong');location.href='register_pegawai.php';</script>";
    } elseif (empty($nik)) {
        echo "<script>alert('NIK tidak boleh kosong');location.href='register_pegawai.php';</script>";
    } elseif (empty($alamat)) {
        echo "<script>alert('Alamat tidak boleh kosong');location.href='register_pegawai.php';</script>";
    } elseif (empty($gender)) {
        echo "<script>alert('Gender tidak boleh kosong');location.href='register_pegawai.php';</script>";
    } elseif (empty($telp)) {
        echo "<script>alert('Nomor telepon tidak boleh kosong');location.href='register_pegawai.php';</script>";
    } elseif (empty($id_jabatan)) {
        echo "<script>alert('Jabatan tidak boleh kosong');location.href='register_pegawai.php';</script>";
    } elseif (empty($username)) {
        echo "<script>alert('Username tidak boleh kosong');location.href='register_pegawai.php';</script>";
    } elseif (empty($password)) {
        echo "<script>alert('Password tidak boleh kosong');location.href='register_pegawai.php';</script>";
    } else {
        include "koneksi.php";

        // Insert data ke dalam tabel pegawai tanpa hash pada password
        $insert = mysqli_query($conn, "INSERT INTO pegawai (nama_pegawai, nik, alamat, gender, telp, id_jabatan, username, password) VALUES ('$nama_pegawai', '$nik', '$alamat', '$gender', '$telp', '$id_jabatan', '$username', '$password')") or die(mysqli_error($conn));

        if ($insert) {
            echo "<script>alert('Sukses menambahkan pegawai');location.href='index.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan pegawai');location.href='register_pegawai.php';</script>";
        }
    }
}
?>
