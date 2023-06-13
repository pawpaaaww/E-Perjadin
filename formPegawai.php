<?php
session_start();
require "function.php";

// Cek apakah pengguna sudah login
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
    <title>Form Pegawai</title>
    <!-- Memasukkan file CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- Memasukan file CSS global -->
    <link rel="stylesheet" href="./src/style/global.css">
</head>

<body class="bg">
    <div id="loader" class="loader"></div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-nav sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="menuUtama.php"> <b>E - Perjadin</b></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="formPegawai.php">Form Pegawai</a>
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
        <div class="container mt-5">
            <div class="row align-items-center">
                <div class="col-2">
                    <img src="src/assets/images/logokiri.png" alt="Logo Kiri" width="150">
                </div>
                <div class="col-8 text-center">
                    <h3 class="text-uppercase">Form Data Pegawai <br> Sentra wyata guna bandung</h3>
                </div>
                <div class="col-2 text-right">
                    <img src="src/assets/images/logokanan.png" class="logo-kanan" alt="Logo Kanan" width="75">
                </div>
            </div>
        </div>
    </header>
    <hr>
    <div class="container mt-4">
        <form method="POST" action="">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group form-pegawai">
                        <label for="nip">NIP</label>
                        <input type="text" class="form-control" id="nip" name="nip" placeholder="Masukkan NIP" autocomplete="off" oninput="validateInput(this)" required>
                    </div>
                    <div class="form-group form-pegawai">
                        <label for="nama">Nama Pegawai</label>
                        <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" placeholder="Masukkan Nama Pegawai" autocomplete="off" required>
                    </div>
                    <div class="form-group form-pegawai">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" autocomplete="off" ->
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-pegawai">
                        <label for="jabatan">Jabatan </label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Masukkan Jabatan" autocomplete="off" required>
                    </div>
                    <div class="form-group form-pegawai">
                        <label for="gol"> Golongan </label>
                        <input type="text" class="form-control" id="golongan" name="golongan" placeholder="Masukkan Golongan " autocomplete="off" required>
                    </div>
                    <div class="form-group form-pegawai">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" rows="3" name="alamat" placeholder="Masukkan Alamat"></textarea autocomplete="off" required>
                    </div>
                    <div class="col text-end">
                        <button type="submit" class="btn btn-primary ms-4" id="submit" name="submit">Simpan</button>
                        <button type="button" class="btn btn-danger" id="keluar">Keluar</button>
                    </div>
                </div>
            </div>
        </form>
        <div class="row mt-3">
            <div class="col-12 mt-5">
                <div class="card mb-3">
                    <div class="card-header">
                    <p class="fs-5 text-center mt-3"> <b>Daftar Pegawai</b></p>
                    </div>
                    <div class="card-body" style="height: 350px; overflow: scroll;">
                <table class="table table-bordered">
                    <thead class="text-center">
                        <th scope="col">No</th>
                        <th scope="col">NIP</th>
                        <th scope="col">Nama Pegawai</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Golongan</th>
                        <th scope="col">Alamat</th>
                    </thead>
                    <tbody>
                        <?php
                        $dataPegawai = tablepegawai(); // Mengambil semua data pegawai dari database
                        foreach ($dataPegawai as $index => $pegawai) {
                            echo "<td>" . ($index + 1) . "</td>";
                            echo "<td>" . $pegawai['nip'] . "</td>";
                            echo "<td>" . $pegawai['nama_pegawai'] . "</td>";
                            echo "<td>" . $pegawai['tanggal_lahir'] . "</td>";
                            echo "<td>" . $pegawai['jabatan'] . "</td>";
                            echo "<td>" . $pegawai['golongan'] . "</td>";
                            echo "<td>" . $pegawai['alamat'] . "</td>";

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="./src/js/index.js"></script>
<script src="./src/js/sweetalert2.all.min.js"></script>
<!-- cek dan alert start -->
<?php
if (isset($_POST["submit"])) {
    $conn = koneksi();
    if (pegawai($_POST, $conn) > 0) {
        echo "<script> 
            Swal.fire({
                title: 'Data Berhasil di Tambahkan!',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = 'formPegawai.php';
            });
        </script>";
    } else {
        echo "<script> 
            Swal.fire({
                title: 'Data Gagal di Tambahkan!',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        </script>";
    }

    mysqli_close($conn);
}
?>
<!-- cek dan alert end -->
<script>

// Modal Info Button Keluar Start
var keluar = document.getElementById("keluar");
keluar.onclick = function() {
    Swal.fire({
        title: 'Apakah anda akan keluar?',
        showDenyButton: true,
        confirmButtonText: 'Ya',
        denyButtonText: 'Tidak',
customClass: {
    actions: 'my-actions',
    cancelButton: 'order-1 right-gap',
    confirmButton: 'order-2',
    denyButton: 'order-3',
}
}).then((result) => {if (result.isConfirmed) {
window.location.href = 'index.php';} 
else if (result.isDenied) {}
})};





</script>

</body>

</html>