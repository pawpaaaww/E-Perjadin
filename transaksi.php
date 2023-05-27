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

<body>
    <div class="loader" id="loader"></div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="menuUtama.php">E - Perjadin</a>
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
        <form>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="no_surat_tugas">No. Surat Tugas</label>
                        <input type="text" class="form-control" id="no_surat_tugas" placeholder="Masukkan No. Surat Tugas">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama">
                    </div>
                    <div class="form-group">
                        <label for="nip">NIP</label>
                        <input type="text" class="form-control" id="nip" placeholder="Masukkan NIP">
                    </div>
                    <div class="form-group">
                        <label for="tempat_perjadin">Tempat Perjadin</label>
                        <input type="text" class="form-control" id="tempat_perjadin" placeholder="Masukkan Tempat Perjadin">
                    </div>
                    <div class="form-group">
                        <label for="tgl_berangkat">Tanggal Berangkat</label>
                        <input type="date" class="form-control" id="tgl_berangkat">
                    </div>
                    <div class="form-group">
                        <label for="tgl_selesai">Tanggal Selesai</label>
                        <input type="date" class="form-control" id="tgl_selesai">
                    </div>
                    <div class="form-group">
                        <label for="lama_dinas">Lama Dinas</label>
                        <input type="text" class="form-control" id="lama_dinas" placeholder="Masukkan Lama Dinas">
                    </div>
                    <div class="form-group">
                        <label for="kegiatan_perjadin">Kegiatan Perjadin</label>
                        <textarea class="form-control" id="kegiatan_perjadin" rows="3" placeholder="Masukkan Kegiatan Perjadin"></textarea>
                    </div>
                </div>
                <div class="col-md-6 mt-4 border">
                    <div class="border-biaya mt-3">
                        <h5 class="text-center text-uppercase">Biaya Perjadin</h5>
                    </div>
                    <hr class="line d-flex justify-content-center">
                    <div class="form-group">
                        <label for="biaya_penginapan">Biaya Penginapan</label>
                        <input type="text" class="form-control" id="biaya_penginapan" placeholder="Masukkan Biaya Penginapan">
                    </div>
                    <div class="form-group">
                        <label for="biaya_transaksi">Biaya Transaksi</label>
                        <input type="text" class="form-control" id="biaya_transaksi" placeholder="Masukkan Biaya Transaksi">
                    </div>
                    <div class="form-group">
                        <label for="uang_harian">Uang Harian</label>
                        <input type="text" class="form-control" id="uang_harian" placeholder="Masukkan Uang Harian">
                    </div>
                    <div class="form-group">
                        <label for="uang_pendamping">Uang Pendamping</label>
                        <input type="text" class="form-control" id="uang_pendamping" placeholder="Masukkan Uang Pendamping">
                    </div>
                    <div class="form-group">
                        <label for="total_biaya">Total Biaya Perjadin</label>
                        <input type="text" class="form-control" id="total_biaya" placeholder="Total Biaya Perjadin" disabled>
                    </div>
                    <div class="col-4 offset-8 mt-4 ">
                        <button type="button" class="btn btn-primary ms-5">Baru</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- Memasukkan file JavaScript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>