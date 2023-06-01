-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 29 Bulan Mei 2023 pada 10.28
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perjadin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `pass` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `username`, `pass`) VALUES
(1, 'admin', '123'),
(24, 'paw', '$2y$10$fC1MC2bCcGY3oF.RGHKfWOs02n45/PG4RXrz.6Q86Fq/Mv8NqGaxq'),
(25, 'salma', '$2y$10$gP8FewcZ6oNNc.ml1BqJzOuRuJTcnDLlBpFYU5NCMIwaV43hhrUjS'),
(26, 'qwe', '$2y$10$Kr211hIUGlZn4u/rQfxJ3O4ah2CtoSC4uom21/ZVcGSaVRUJk2zAi'),
(27, '1234', '$2y$10$lhGnd62cot3zBnjifsrkeuARcO5ZZ86YwJDXUwKJGMvs5wcjubowq'),
(28, 'zxc', '$2y$10$VZObczxVUAGb1aDeosXInuzNSh7qw/CCg7AI9JsX77x32OzBclFli'),
(29, 'pawpaw', '$2y$10$GGvWT05o51wfgPFUnPJ/TO3NcKHmAudpzjSmM2XolXvGd8JrZEW8a'),
(30, 'pawz', '$2y$10$ifmaYE.kCtwWfXRJorS7ZeFPnpUokdqvWjPFjz/HlF1dl9529sE02'),
(31, 'test', '$2y$10$pZeRhPvOikyC5dgiAMH/a.rWBR4G.8yVtKLAJPHmuzdQezs5dXubK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int NOT NULL,
  `nip` varchar(255) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `golongan` varchar(10) NOT NULL,
  `alamat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nip`, `nama_pegawai`, `tanggal_lahir`, `jabatan`, `golongan`, `alamat`) VALUES
(3, '123123', 'paw', '2002-03-05', 'anjay', '123', 'Jl Kiara Asri III No 14'),
(4, 'asda', 'adit', '2023-05-17', '123', '123', 'Jl Kiara Asri III No 14'),
(12, '224234', 'test', '2023-05-28', 'test', 'test', 'test'),
(13, '333', 'TEST', '2023-05-11', 'TEST', 'TEST', 'TEST'),
(14, '11234', 'ADITTTTT', '2023-05-01', 'hrd', '2', 'watasd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int NOT NULL,
  `no_surat_tugas` varchar(50) DEFAULT NULL,
  `tempat_perjadin` varchar(100) DEFAULT NULL,
  `tanggal_berangkat` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `lama_dinas` varchar(50) DEFAULT NULL,
  `kegiatan_perjadin` varchar(200) DEFAULT NULL,
  `biaya_penginapan` int DEFAULT NULL,
  `biaya_transaksi` int DEFAULT NULL,
  `uang_harian` int DEFAULT NULL,
  `uang_pendamping` int DEFAULT NULL,
  `total_biaya_perjadin` int DEFAULT NULL,
  `nip` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `no_surat_tugas`, `tempat_perjadin`, `tanggal_berangkat`, `tanggal_selesai`, `lama_dinas`, `kegiatan_perjadin`, `biaya_penginapan`, `biaya_transaksi`, `uang_harian`, `uang_pendamping`, `total_biaya_perjadin`, `nip`) VALUES
(11, 'A.012/PT-AL/III/2023', 'Bandung', '2023-05-28', '2023-05-30', '2 HARI ', 'Acara moshing', 100000, 20000, 50000, 20000, 190000, '123123'),
(12, 'GDGD4345345', 'test', '2023-05-28', '2023-05-29', '1 HARI ', 'test', 1, 1, 1, 1, 4, '224234'),
(13, 'GDGD4345345', 'test', '2023-05-04', '2023-05-26', '22 HARI ', 'test', 1, 1, 1, 1, 4, '224234'),
(14, 'GDGD4345345112314', 'test', '2023-05-10', '2023-06-02', '23 HARI ', 'test', 12312, 12312, 1231, 12312, 38167, '11234');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_username` (`username`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
