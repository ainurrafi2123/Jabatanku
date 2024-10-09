<?php
if ($_POST) {
    $nama_jabatan = $_POST['nama_jabatan'];
    $gaji_pokok = $_POST['gaji_pokok'];
    $tunjangan = $_POST['tunjangan'];

    // Validasi input
    if (empty($nama_jabatan)) {
        echo "<script>alert('Nama pegawai tidak boleh kosong');location.href='tambah_jabatan.php';</script>";
    } elseif (empty($gaji_pokok)) {
        echo "<script>alert('NIK tidak boleh kosong');location.href='tambah_jabatan.php';</script>";
    } elseif (empty($tunjangan)) {
        echo "<script>alert('Alamat tidak boleh kosong');location.href='tambah_jabatan.php';</script>";

    } else {
        include "koneksi.php";

        // Perbaiki nama tabel dan kolom sesuai dengan yang Anda miliki di database
        $insert = mysqli_query($conn, "INSERT INTO jabatan (nama_jabatan, gaji_pokok, tunjangan) VALUES ('$nama_jabatan', '$gaji_pokok', '$tunjangan')") or die(mysqli_error($conn));

        if ($insert) {
            echo "<script>alert('Sukses menambahkan jabatan');location.href='tambah_jabatan.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan jabatan');location.href='tambah_jabatan.php';</script>";
        }
    }
}
?>
