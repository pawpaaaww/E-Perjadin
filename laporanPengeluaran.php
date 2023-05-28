<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pengeluaran</title>
    <!-- Memasukkan file CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="src/style/global.css">
    <script src="./src/js/index.js"></script>
</head>

<body class="bg vh-100">
    <div class="loader" id="loader"></div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-nav sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><b>E - Perjadin</b></a>
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
                        <a class="nav-link active" href="laporanPengeluaran.php">Laporan Pengeluaran Kas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <h2 class="text-center mt-4 text-uppercase">Laporan Pengeluaran</h2>
        <hr>
        <div class="row mt-5">
            <div class="col-10 offset-2 mb-3 mt-3">
                <form>
                    <div class="row align-items-center ">
                        <label class="col-auto col-form-label text-center ">Periode Transaksi</label>
                        <div class="col-sm-10 d-flex">
                            <div class="col-3 me-3">
                                <div class="input-group">
                                    <input type="text" id="from" name="from" class="form-control form-control-sm" data-target="#reservationdate" autocomplete="off">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                            <div class="col-auto">
                                <label class="col-form-label p-1">S/D</label>
                            </div>
                            <div class="col-3 ms-3">
                                <div class="input-group">
                                    <input type="text" id="to" name="to" class="form-control form-control-sm" data-target="#reservationdate2" autocomplete="off">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                            <div class="col-4 ms-4">
                                <button class="btn btn-primary btn-sm" type="reset" onclick="location.reload()">
                                    <span class="fa fa-file me-1"></span>Baru
                                </button>
                                <button class="btn btn-success btn-sm" id="cetak">
                                    <span class=" fa fa-print me-1"></span>Cetak
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-12 mt-1">
            <div class="container-fluid p-2">
                <div class="container-fluid border border-1">
                    <div class="col-12 mt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col"">No. Surat</th>
                                    <th scope=" col">Nama</th>
                                    <th scope="col"">NIP</th>
                                    <th scope=" col""> Tanggal Berangkat </th>
                                    <th scope="col"">Tanggal Selesai</th>
                                    <th scope=" col"">Lama Dinas</th>
                                    <th scope=" col"">Total Biaya</th>
                                    <th scope=" col"">Kegiatan Perjadin</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>


                <!-- Memasukkan file JavaScript Bootstrap -->
                <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>

</html>