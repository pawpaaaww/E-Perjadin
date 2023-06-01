<?php
session_start();
require "function.php";


$conn = koneksi();
if (!isset($_SESSION['username'])) {
    // Jika tidak, redirect ke halaman login
    header("Location: index.php");
    exit();
}

// Dapatkan nama pengguna dari sesi
$namaUser = $_SESSION['username'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        E - Perjadin
    </title>
    <!-- Memasukkan file CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/style/global.css">
    <script src="./src/js/index.js"></script>
</head>

<body>
    <div id="loader" class="loader"></div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-nav sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="menuUtama.php"><b>E - Perjadin</b></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="formPegawai.php">Form Pegawai</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="transaksi.php">Form Transaksi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="laporanPengeluaran.php">Laporan Pengeluaran Kas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid-xl">
                <div class="hero d-flex align-items-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-8 mx-auto text-center">
                                <p class="h1 border border-5">Selamat Datang <?=$namaUser?> !!</p>
                            </div>
                        </div>
                    </div>
                </div>
    </div>

    <!-- Memasukkan file JavaScript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    </script>

</body>

</html>