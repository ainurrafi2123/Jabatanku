<?php
if (isset($_GET['id_pegawai'])) {
    include "koneksi.php";

    // Menghindari SQL Injection dengan prepared statement
    $id_pegawai = $_GET['id_pegawai'];
    
    $qry_hapus = $conn->prepare("DELETE FROM pegawai WHERE id_pegawai = ?");
    $qry_hapus->bind_param("i", $id_pegawai);

    if ($qry_hapus->execute()) {
        echo "<script>alert('Sukses hapus pegawai');location.href='tampil_pegawai.php';</script>";
    } else {
        echo "<script>alert('Gagal hapus pegawai');location.href='tampil_pegawai.php';</script>";
    }
    
    $qry_hapus->close();
    $conn->close();
} else {
    echo "<script>alert('ID pegawai tidak ditemukan');location.href='tampil_pegawai.php';</script>";
}
?>
