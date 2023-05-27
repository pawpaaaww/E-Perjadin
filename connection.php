<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "perjadin";
//buat koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);
//cek koneksi
if (!$conn) {
    die("Koneksi database gagal : " . mysqli_connect_error());
}
