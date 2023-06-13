<?php
// Mendapatkan nilai dari parameter GET
$from = $_GET['from'];
$to = $_GET['to'];

// Melakukan pemrosesan dan pengambilan data laporan berdasarkan periode yang dipilih
include 'function.php';
$dataLaporan = laporanPengeluaranByPeriode($from, $to);

// Membuat dokumen PDF untuk mencetak laporan
require('fpdf/fpdf.php');

class PDF extends FPDF
{
    // Fungsi untuk mengatur tata letak landscape
    function Landscape()
    {
        $this->AddPage('L');
        $this->SetAutoPageBreak(true, 5);
    }
    // ...

    // Fungsi untuk mengatur header dokumen PDF
    function Header()
    {
        // Judul halaman
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 10, 'Laporan Pengeluaran', 0, 1, 'C');
        $this->Ln(5);

        // Tabel header
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(15, 7, 'No.', 1, 0, 'C'); // Ubah lebar kolom No.
        $this->Cell(40, 7, 'No. Surat', 1, 0, 'C');
        $this->Cell(50, 7, 'Nama', 1, 0, 'C'); // Ubah lebar kolom Nama
        $this->Cell(30, 7, 'NIP', 1, 0, 'C');
        $this->Cell(40, 7, 'Tanggal Berangkat', 1, 0, 'C'); // Ubah lebar kolom Tanggal Berangkat
        $this->Cell(40, 7, 'Tanggal Selesai', 1, 0, 'C'); // Ubah lebar kolom Tanggal Selesai
        $this->Cell(20, 7, 'Lama Dinas', 1, 0, 'C');
        $this->Cell(25, 7, 'Total Biaya', 1, 0, 'C');
        $this->Cell(50, 7, 'Kegiatan Perjadin', 1, 1, 'C'); // Ubah lebar kolom Kegiatan Perjadin
    }

    // Fungsi untuk mengatur footer dokumen PDF
    function Footer()
    {
        // Teks kaki
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Halaman ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

// Instansiasi objek PDF
$pdf = new PDF('P', 'mm', 'A4');
$pdf->AliasNbPages();
$pdf->SetFont('Arial', '', 10);

// Membuat halaman potret
$pdf->AddPage();


// Mencetak data laporan ke dalam tabel
$pdf->SetFillColor(224, 235, 255);
$pdf->SetTextColor(0);
$pdf->SetDrawColor(128, 0, 0);
$pdf->SetLineWidth(0.3);

$index = 0; // Inisialisasi counter
foreach ($dataLaporan as $laporan) {
    $index++;
    $pdf->Cell(15, 7, $index, 1, 0, 'C');
    $pdf->Cell(40, 7, $laporan['no_surat_tugas'], 1, 0, 'L');
    $pdf->Cell(50, 7, $laporan['nama_pegawai'], 1, 0, 'L');
    $pdf->Cell(30, 7, $laporan['nip'], 1, 0, 'L');
    $pdf->Cell(40, 7, $laporan['tanggal_berangkat'], 1, 0, 'L');
    $pdf->Cell(40, 7, $laporan['tanggal_selesai'], 1, 0, 'L');
    $pdf->Cell(20, 7, $laporan['lama_dinas'], 1, 0, 'C');
    $pdf->Cell(25, 7, $laporan['total_biaya_perjadin'], 1, 0, 'R');
    $pdf->Cell(50, 7, $laporan['kegiatan_perjadin'], 1, 1, 'L');
}

// Menutup dokumen PDF
$pdf->Output();
