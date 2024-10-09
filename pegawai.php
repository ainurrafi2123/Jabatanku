<?php
    include 'secure.php';
	include 'sidebar.php';
	include 'navbar.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="Assets/home.css">

	<style>
        body {
            margin: 0;
            padding: 0;

        }

        /* Table styling */
        .table-container {
            margin-top: 20px;
            padding: 15px;
        }

        table.table {
            font-size: 11px; /* Font size lebih kecil untuk tabel */
        }

        table.table th, table.table td {
            padding: 3px 10px;
            text-align: center;
        }

        /* Responsive layout untuk tampilan kecil */
        @media (max-width: 768px) {
            table.table {
                font-size: 12px; /* Font size lebih kecil untuk tampilan mobile */
            }

            table.table th, table.table td {
                padding: 5px;
            }

            .btn {
                padding: 4px 8px;
            }
        }

        .btn-sm {
            padding: 5px 10px;
            font-size: 12px;
        }

    </style>

	<title></title>
</head>
<body>


		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="home.php">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="pegawai.php">Pegawai</a>
						</li>
					</ul>
				</div>
				<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download PDF</span>
				</a>
			</div>

			<div class="table-data">
            <h3>Tampil Pegawai</h3>
            <table class="table table-hover table-striped table-bordered">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>Alamat</th>
                    <th>Gender</th>
                    <th>Username</th>
                    <th>Telp</th>
                    <th>Jabatan</th>
                    <th>Aksi</th>
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
                        <a href="ubah_pegawai.php?id_pegawai=<?= $dt_pegawai['id_pegawai'] ?>" class="btn btn-success btn-sm">Ubah</a>
                        <a href="hapus_pegawai.php?id_pegawai=<?= $dt_pegawai['id_pegawai'] ?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger btn-sm">Hapus</a>
                    </td>

                </tr>
                <?php 
          			}
          			?>
            </tbody>
        </table>
        <a href="tambah_pegawai.php" class="btn btn-primary btn-sm">Tambah Pegawai</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
		<script src="Assets/script.js"></script>
</body>
</html>	


	

