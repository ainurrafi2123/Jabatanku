<?php
if($_POST){
    $id_pegawai = $_POST['id_pegawai'];
    $nama_pegawai = $_POST['nama_pegawai'];
    $nik = $_POST['nik'];
    $alamat = $_POST['alamat'];
    $gender = $_POST['gender'];
    $telp = $_POST['telp'];
    $id_jabatan = $_POST['id_jabatan'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validasi input
    if(empty($nama_pegawai)){
        echo "<script>alert('Nama pegawai tidak boleh kosong');location.href='ubah_pegawai.php?id_pegawai=$id_pegawai';</script>";
    } elseif(empty($username)){
        echo "<script>alert('Username tidak boleh kosong');location.href='ubah_pegawai.php?id_pegawai=$id_pegawai';</script>";
    } else {
        include "koneksi.php";

        // Jika password kosong, maka tidak di-update
        if(empty($password)){
            $update = mysqli_query($conn, "UPDATE pegawai SET nama_pegawai='$nama_pegawai', nik='$nik', gender='$gender', alamat='$alamat', telp='$telp', username='$username', id_jabatan='$id_jabatan' WHERE id_pegawai = '$id_pegawai'") or die(mysqli_error($conn));
        } else {
            // Jika password diisi, maka di-update
            $update = mysqli_query($conn, "UPDATE pegawai SET nama_pegawai='$nama_pegawai', nik='$nik', gender='$gender', alamat='$alamat', telp='$telp', username='$username', password='$password', id_jabatan='$id_jabatan' WHERE id_pegawai = '$id_pegawai'") or die(mysqli_error($conn));
        }

        // Cek apakah query berhasil dijalankan
        if($update){
            echo "<script>alert('Sukses update data pegawai');location.href='home.php';</script>";
        } else {
            echo "<script>alert('Gagal update data pegawai');location.href='ubah_pegawai.php?id_pegawai=$id_pegawai';</script>";
        }
    }
}
?>
