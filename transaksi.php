<?php

require "function.php";


$conn = koneksi();

if (isset($_POST["submit"])) {
    if (transaksi($_POST, $conn) > 0) {
        echo "<script> 
            alert('Data Berhasil di Tambahkan!');
            document.location.href = 'transaksi.php';
        </script>";
    } else {
        echo "<script> 
            alert('Data Gagal di Tambahkan!');
        </script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pegawai</title>
    <!-- Memasukkan file CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/style/global.css">
    <script src="./src/js/index.js"></script>
</head>

<body class="bg">
    <div class="loader" id="loader"></div>
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
                        <a class="nav-link active" href="transaksi.php">Form Transaksi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="laporanPengeluaran.php">Laporan Pengeluaran Kas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <header>
        <div class="container mt-3">
            <div class="row align-items-center">
                <div class="col-2">
                    <img src="src/assets/images/logokiri.png" alt="Logo Kiri" width="150">
                </div>
                <div class="col-8 text-center">
                    <h3 class="text-uppercase">Transaksi </h3>
                </div>
            </div>
        </div>
    </header>
    <hr>

    <div class="container mt-4">
        <form method="POST" action="">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="no_surat_tugas">No. Surat Tugas</label>
                        <input type="text" class="form-control" id="no_surat_tugas" placeholder="Masukkan No. Surat Tugas" name="no_surat_tugas" oninput="convertToUppercase(this)">
                    </div>
                    <div class="form-group">
                        <label for="nama_pegawai">Nama</label>
                        <?php
                        $pegawai = query("SELECT * FROM pegawai");
                        ?>
                        <select class="form-control" id="nama_pegawai" name="nama_pegawai" onchange="getNIP()">
                            <option value="">Pilih Nama</option>
                            <?php foreach ($pegawai as $nama_pegawai) : ?>
                                <option value="<?= $nama_pegawai['nama_pegawai']; ?>"><?= $nama_pegawai['nama_pegawai']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nip">NIP</label>
                        <input type="text" class="form-control" id="nip" placeholder="NIP" readonly name="nip">
                    </div>
                    <div class="form-group">
                        <label for="tempat_perjadin">Tempat Perjadin</label>
                        <input type="text" class="form-control" id="tempat_perjadin" placeholder="Masukkan Tempat Perjadin" name="tempat_perjadin">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_berangkat">Tanggal Berangkat</label>
                        <input type="date" class="form-control" id="tanggal_berangkat" name="tanggal_berangkat">
                    </div>
                    <div class="form-group">
                        <label for="tgl_selesai">Tanggal Selesai</label>
                        <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" onchange="hitungLamaDinas()">

                    </div>
                    <div class="form-group">
                        <label for="lama_dinas">Lama Dinas</label>
                        <input type="text" class="form-control" id="lama_dinas" placeholder="Masukkan Lama Dinas" name="lama_dinas">
                    </div>
                    <div class="form-group">
                        <label for="kegiatan_perjadin">Kegiatan Perjadin</label>
                        <textarea class="form-control" id="kegiatan_perjadin" rows="3" placeholder="Masukkan Kegiatan Perjadin" name="kegiatan_perjadin"></textarea>
                    </div>
                </div>
                <div class="col-md-6 mt-4 border bungkus">
                    <div class="border-biaya mt-3">
                        <h5 class="text-center text-uppercase">Biaya Perjadin</h5>
                    </div>
                    <hr class="line d-flex justify-content-center">
                    <div class="form-group">
                        <label for="biaya_penginapan">Biaya Penginapan</label>
                        <input type="text" class="form-control" id="biaya_penginapan" placeholder="Masukkan Biaya Penginapan" name="biaya_penginapan" oninput="validateInput(this)" required>
                    </div>
                    <div class="form-group">
                        <label for="biaya_transaksi">Biaya Transaksi</label>
                        <input type="text" class="form-control" id="biaya_transaksi" placeholder="Masukkan Biaya Transaksi" name="biaya_transaksi" oninput="validateInput(this)" required>
                    </div>
                    <div class="form-group">
                        <label for="uang_harian">Uang Harian</label>
                        <input type="text" class="form-control" id="uang_harian" placeholder="Masukkan Uang Harian" name="uang_harian" oninput="validateInput(this)" required>
                    </div>
                    <div class="form-group">
                        <label for="uang_pendamping">Uang Pendamping</label>
                        <input type="text" class="form-control" id="uang_pendamping" placeholder="Masukkan Uang Pendamping" name="uang_pendamping" oninput="validateInput(this)" required>
                    </div>
                    <div class="form-group">
                        <label for="total_biaya">Total Biaya Perjadin</label>
                        <input type="text" class="form-control" id="total_biaya" placeholder="Total Biaya Perjadin" name="total_biaya_perjadin" readonly>
                    </div>
                    <div class="col mt-4 text-end">
                        <button type="button" class="btn btn-primary ms-5">Baru</button>
                        <button type="submit" class="btn btn-success" id="submit" name="submit">Simpan</button>
                    </div>
                </div>

            </div>
        </form>
    </div>
    <!-- Memasukkan file JavaScript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./src/js/index.js"></script>
    <script>
        function getNIP() {
            var nama = document.getElementById("nama_pegawai").value;
            var nipField = document.getElementById("nip");

            // Ambil data pegawai berdasarkan nama
            <?php $pegawai = query("SELECT * FROM pegawai"); ?>
            <?php foreach ($pegawai as $data) : ?>
                if ("<?= $data['nama_pegawai']; ?>" === nama) {
                    nipField.value = "<?= $data['nip']; ?>";

                }
            <?php endforeach; ?>
        }
    </script>

</body>

</html>