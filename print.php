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
        $this->Cell(50, 7, 'Kegiatan Perjadin', 1, 0, 'C'); // Ubah lebar kolom Kegiatan Perjadin
        $this->Ln();
    }

    // ...


    // Fungsi untuk mengatur konten tabel
    function Content($data)
    {
        $no=1;
        $this->SetFont('Arial', '', 10);

        // Menampilkan data laporan
        foreach ($data as $row) {
            $this->Cell(10, 7, $no++, 1, 0, 'C');
            $this->Cell(40, 7, $row['nama_pegawai'], 1, 0, 'C');
            $this->Cell(40, 7, $row['no_surat_tugas'], 1, 0, 'C');
            $this->Cell(30, 7, $row['nip'], 1, 0, 'C');
            $this->Cell(35, 7, $row['tanggal_berangkat'], 1, 0, 'C');
            $this->Ln();
        }
    }
}

// Membuat objek PDF
$pdf = new PDF();

// Membuat halaman baru
$pdf->AddPage();

// Mencetak konten tabel laporan
$pdf->Content($dataLaporan);

// Mengeluarkan hasil laporan dalam bentuk file PDF
$pdf->Output();
?>
