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


    $nip = $data['nip'];
    $pegawai = getPegawaiByNIP($nip);


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


function laporanPengeluaranByPeriode($from, $to)
{
    $conn = koneksi();


    // Mengubah format tanggal
    $from = date_format(date_create($from), 'Y-m-d');
    $to = date_format(date_create($to), 'Y-m-d');

    $sql = "SELECT transaksi.no_surat_tugas, pegawai.nama_pegawai, pegawai.nip, transaksi.tanggal_berangkat, transaksi.tanggal_selesai, transaksi.lama_dinas, transaksi.total_biaya_perjadin, transaksi.kegiatan_perjadin 
    FROM transaksi INNER JOIN pegawai ON transaksi.nip = pegawai.nip
    WHERE transaksi.tanggal_berangkat >= '$from' AND transaksi.tanggal_selesai <= '$to'";

    $result = $conn->query($sql);

    if ($result) {

        $dataLaporan = array();
        while ($row = $result->fetch_assoc()) {
            $dataLaporan[] = $row;
        }
        $conn->close();
        return $dataLaporan;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        $conn->close();
        return array();
    }
}

function deletedata()
{
    if (isset($_GET['delete'])) {
        $conn = koneksi();

        $query = "DELETE FROM transaksi";

        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "Data deleted successfully";
        } else {
            echo "Error deleting data";
        }

        mysqli_close($conn);
        exit;
    }
}
