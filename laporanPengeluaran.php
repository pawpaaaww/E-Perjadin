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
        <div class="row">
            <div class="col-10 offset-2">
                <form>
                    <div class="row align-items-center ">
                        <label class="col-auto col-form-label text-center ">Periode Transaksi</label>
                        <div class="col-sm-10 d-flex">
                            <div class="col-3 me-3">
                                <div class="input-group">
                                    <input type="date" id="from" name="from" class="form-control form-control-sm" data-target="#reservationdate" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-auto">
                                <label class="col-form-label p-1">S/D</label>
                            </div>
                            <div class="col-3 ms-3">
                                <div class="input-group">
                                    <input type="date" id="to" name="to" class="form-control form-control-sm" data-target="#reservationdate2" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-4 ms-4">
                                <button class="btn btn-primary btn-sm" type="button" onclick="filterLaporan()">
                                    <span class="fa fa-filter me-1"></span>Filter
                                </button>
                                <button class="btn btn-primary btn-sm" type="reset" onclick="location.reload()">
                                    <span class="fa fa-file me-1"></span>Baru
                                </button>
                                <button class="btn btn-success btn-sm" id="cetak" onclick="cetakLaporan()">
                                    <span class=" fa fa-print me-1"></span>Cetak
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-10 mx-auto mt-3">
                <div class="card mb-3">
                    <div class="card-header">
                        <p>Detail</p>
                    </div>
                    <div class="card-body" style="height: 350px; overflow: scroll;">
                        <table class="table table-bordered" id="laporanTable">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">No.</th>
                                    <th scope="col">No. Surat</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">NIP</th>
                                    <th scope="col">Tanggal Berangkat</th>
                                    <th scope="col">Tanggal Selesai</th>
                                    <th scope="col">Lama Dinas</th>
                                    <th scope="col">Total Biaya</th>
                                    <th scope="col">Kegiatan Perjadin</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include 'function.php';
                                $dataLaporan = laporanPengeluaran(); // Mengambil data laporan pengeluaran dari database
                                $i = 0; // Inisialisasi counter

                                foreach ($dataLaporan as $laporan) {
                                    $i++;
                                    echo "<tr>";
                                    echo "<td>" . $i . "</td>";
                                    echo "<td>" . $laporan['no_surat_tugas'] . "</td>";
                                    echo "<td>" . $laporan['nama_pegawai'] . "</td>";
                                    echo "<td>" . $laporan['nip'] . "</td>";
                                    echo "<td>" . $laporan['tanggal_berangkat'] . "</td>";
                                    echo "<td>" . $laporan['tanggal_selesai'] . "</td>";
                                    echo "<td>" . $laporan['lama_dinas'] . "</td>";
                                    echo "<td>" . $laporan['total_biaya_perjadin'] . "</td>";

                                    $kegiatanPerjadin = $laporan['kegiatan_perjadin'];
                                    $explodedKegiatan = explode(" ", $kegiatanPerjadin);
                                    $kegiatanFormatted = "";
                                    foreach ($explodedKegiatan as $index => $word) {
                                        $kegiatanFormatted .= $word;
                                        if (($index + 1) % 4 === 0) {
                                            $kegiatanFormatted .= "<br>";
                                        } else {
                                            $kegiatanFormatted .= " ";
                                        }
                                    }

                                    echo "<td>" . $kegiatanFormatted . "</td>";

                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Memasukkan file JavaScript Bootstrap -->
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function cetakLaporan() {
            var from = document.getElementById("from").value;
            var to = document.getElementById("to").value;
            window.open("print-laporan.php?from=" + from + "&to=" + to, "_blank");
        }


        function filterLaporan() {
            var fromDate = document.getElementById("from").value;
            var toDate = document.getElementById("to").value;

            var rows = document.querySelectorAll("#laporanTable tbody tr");
            rows.forEach(function(row) {
                var tanggalBerangkat = row.querySelector("td:nth-child(5)").innerText;
                var tanggalSelesai = row.querySelector("td:nth-child(6)").innerText;

                if (tanggalBerangkat >= fromDate && tanggalSelesai <= toDate) {
                    row.style.display = "table-row";
                } else {
                    row.style.display = "none";
                }
            });
        }
    </script>
</body>

</html>