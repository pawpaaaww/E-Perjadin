<?php

require "function.php";

if (isset($_POST["submit"])) {
    $conn = koneksi();

    if (pegawai($_POST, $conn) > 0) {
        echo "<script> 
            alert('Data Berhasil di Tambahkan!');
            document.location.href = 'formPegawai.php';
        </script>";
    } else {
        echo "<script> 
            alert('Data Gagal di Tambahkan!');
        </script>";
    }

    mysqli_close($conn);
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
    <!-- Memasukan file CSS global -->
    <link rel="stylesheet" href="./src/style/global.css">
</head>

<body class="bg">
    <div id="loader" class="loader"></div>
<<<<<<< HEAD
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
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
=======
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
>>>>>>> 4d1e7fd411c67dcbd4e425a113aeb117418452bc
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
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" autocomplete="off" required>
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
<<<<<<< HEAD
                    <div class="col-5 offset-7">
                        <button type="submit" class="btn btn-primary ms-4" id="submit" name="submit">Simpan</button>
=======
                    <div class="col-12 text-end mb-5">
                        <button type="submit" class="btn btn-primary ms-4" id="simpan">Simpan</button>
>>>>>>> 4d1e7fd411c67dcbd4e425a113aeb117418452bc
                        <button type="button" class="btn btn-secondary">Ubah</button>
                    <a href="login.php" <button type="button" class="btn btn-danger" id="keluar">Keluar</button></a>
                    </div>
                </div>
            </div>
        </form>
        <div class="row mt-3">
            <div class="col-10 offset-1">
                <div class="card">
                <div class="card-header">
                    Input Detail
                </div>
                <div class="card-body" style="height: 250px; overflow: scroll;">
                    <table class="table table-bordered">
                    <thead class="text-center">
                        <th scope="col">No</th>
                        <th scope="col">NIP</th>
                        <th scope="col">Nama Pegawai</th>
                        <th scope="col">tanggal_lahir</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Golongan</th>
                        <th scope="col">Alamat</th>
                        </tr>
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
                </div>
            </div>
        </div>
    </div>

<!-- Memasukkan file JavaScript Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<<<<<<< HEAD
=======
<script src="./src/js/index.js"></script>
<script src="./src/js/sweetalert2.all.min.js"></script>
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
window.location.href = 'index.php';} else if (result.isDenied) {}
})};
// Modal Info Button Keluar End

// Modal Button Simpan Start
var simpan = document.getElementById("simpan");
simpan.onclick = function() {
    Swal.fire({
        title: 'Do you want to save the changes?',
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Yes',
        denyButtonText: 'No',
        customClass: {
            actions: 'my-actions',
            cancelButton: 'order-1 right-gap',
            confirmButton: 'order-2',
            denyButton: 'order-3',
        }
    }).then((result) => {
        if (result.isConfirmed) {
            // Data yang akan dikirim ke server
            var data = {
                nip: document.getElementById("nip").value,
                nama: document.getElementById("nama").value,
                jabatan: document.getElementById("jabatan").value,
                gol: document.getElementById("gol").value,
                alamat: document.getElementById("alamat").value
            };

            // Mengirim data ke server menggunakan AJAX
            $.ajax({
                url: 'connection.php',
                type: 'POST',
                data: data,
                success: function(response) {
                    Swal.fire('Saved!', '', 'success');
                },
                error: function() {
                    Swal.fire('Error!', 'Failed to save the data.', 'error');
                }
            });
        } else if (result.isDenied) {
            Swal.fire('Changes are not saved', '', 'info');
        }
    });
};
// Modal Button Simpan End


</script>
>>>>>>> 4d1e7fd411c67dcbd4e425a113aeb117418452bc

</body>

</html>