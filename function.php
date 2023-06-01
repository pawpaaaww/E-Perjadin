<?php


function koneksi()
{
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "perjadin";

    $conn = mysqli_connect($host, $username, $password, $database);

    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    return $conn;
}



function query($query)
{
    $conn = koneksi();
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    mysqli_close($conn);
    return $rows;
}

function pegawai($data)
{
    $conn = koneksi();

    $nip = $data['nip'];
    $nama_pegawai = $data['nama_pegawai'];
    $tanggal_lahir = date('Y-m-d', strtotime($data["tanggal_lahir"]));
    $jabatan = $data['jabatan'];
    $golongan = $data['golongan'];
    $alamat = $data['alamat'];

    $query = "INSERT INTO pegawai (nip, nama_pegawai, tanggal_lahir, jabatan, golongan, alamat) 
            VALUES ('$nip', '$nama_pegawai', '$tanggal_lahir', '$jabatan', '$golongan', '$alamat')";

    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Error: " . mysqli_error($conn));
    }



    return $result ? mysqli_affected_rows($conn) : -1;
}

function transaksi($data)
{
    $conn = koneksi();

    $no_surat_tugas = $data['no_surat_tugas'];
    $tempat_perjadin = $data['tempat_perjadin'];
    $tanggal_berangkat = date('Y-m-d', strtotime($data["tanggal_berangkat"]));
    $tanggal_selesai = date('Y-m-d', strtotime($data["tanggal_selesai"]));
    $lama_dinas = $data['lama_dinas'];
    $kegiatan_perjadin = $data['kegiatan_perjadin'];
    $biaya_penginapan = $data['biaya_penginapan'];
    $biaya_transaksi = $data['biaya_transaksi'];
    $uang_harian = $data['uang_harian'];
    $uang_pendamping = $data['uang_pendamping'];
    $total_biaya_perjadin = $data['total_biaya_perjadin'];

    // Ambil data pegawai berdasarkan NIP
    $nip = $data['nip'];
    $pegawai = getPegawaiByNIP($nip);

    // Memasukkan data pegawai ke dalam tabel transaksi
    $query = "INSERT INTO transaksi (no_surat_tugas, tempat_perjadin, tanggal_berangkat, tanggal_selesai, lama_dinas, kegiatan_perjadin, biaya_penginapan, biaya_transaksi, uang_harian, uang_pendamping, total_biaya_perjadin, nip) 
            VALUES ('$no_surat_tugas', '$tempat_perjadin', '$tanggal_berangkat', '$tanggal_selesai', '$lama_dinas', '$kegiatan_perjadin', '$biaya_penginapan', '$biaya_transaksi', '$uang_harian', '$uang_pendamping', '$total_biaya_perjadin', '$nip')";

    if (mysqli_query($conn, $query)) {
        return mysqli_affected_rows($conn);
    } else {
        return 0;
    }
}


function getPegawaiByNIP($nip)
{
    $conn = koneksi();
    $query = "SELECT * FROM pegawai WHERE nip = '$nip'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    mysqli_close($conn);
    return $row;
}

function tablepegawai()
{
    $conn = koneksi();
    $query = "SELECT * FROM pegawai";
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    mysqli_close($conn);
    return $rows;
}

function laporanPengeluaran()
{
    $conn = koneksi();
    $query = "SELECT transaksi.no_surat_tugas, pegawai.nama_pegawai, pegawai.nip, transaksi.tanggal_berangkat, transaksi.tanggal_selesai, transaksi.lama_dinas, transaksi.total_biaya_perjadin, transaksi.kegiatan_perjadin 
            FROM transaksi INNER JOIN pegawai ON transaksi.nip = pegawai.nip";
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    mysqli_close($conn);
    return $rows;
}


// ...

function resetPassword($username, $newPassword)
{
    $conn = koneksi();

    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    $query = "UPDATE login SET pass='$hashedPassword' WHERE username='$username'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        return mysqli_affected_rows($conn);
    } else {
        return 0;
    }
}

// Implementasi contoh laporanPengeluaranByPeriode
function laporanPengeluaranByPeriode($from, $to) {
    // Melakukan koneksi ke database (asumsikan menggunakan MySQLi)
    $conn = new mysqli("localhost", "root", "", "perjadin");

    // Memeriksa koneksi
    if ($conn->connect_error) {
        die("Koneksi ke database gagal: " . $conn->connect_error);
    }

    // Membuat query untuk mengambil data laporan berdasarkan periode
    $sql = "SELECT * FROM transaksi INNER JOIN pegawai  WHERE tanggal_berangkat BETWEEN '$from' AND '$to'";
    // Menjalankan query
    $result = $conn->query($sql);
    
    // Mengecek apakah query berhasil dieksekusi
    if ($result) {
        // Mengambil data hasil query
        $dataLaporan = array();
        while ($row = $result->fetch_assoc()) {
            $dataLaporan[] = $row;
        }

        // Menutup koneksi ke database
        $conn->close();

        // Mengembalikan data laporan
        return $dataLaporan;
    } else {
        // Jika query gagal, menampilkan pesan error
        echo "Error: " . $sql . "<br>" . $conn->error;
        // Menutup koneksi ke database
        $conn->close();
        return array(); // Mengembalikan array kosong jika terjadi error
    }
}

