<?php
//-------------------------------------------------------------//
//                    LAPORAN PENERIMAAN                       //
//-------------------------------------------------------------//
// Mendapatkan nilai dari parameter GET
$from = $_GET['from'];
$to = $_GET['to'];

// Melakukan pemrosesan dan pengambilan data laporan berdasarkan periode yang dipilih
include 'function.php';
$conn = koneksi();
$dataLaporan = laporanPengeluaranByPeriode($from, $to);

// Membuat dokumen PDF untuk mencetak laporan
require('fpdf/fpdf.php');

class FPDF_AutoWrapTable extends FPDF
{
    private $data = array();
    private $options = array(
        'filename' => '',
        'destinationfile' => '',
        'paper_size' => 'F4',
        'orientation' => 'P',
    );

    function __construct($data = array(), $options = array())
    {
        parent::__construct();
        $this->data = $data;
        $this->options = $options;
    }

    public function rptDetailData()
    {
        //
        $border = 0;
        $this->AddPage();
        $this->SetAutoPageBreak(true, 60);
        $this->AliasNbPages();
        $left = 25;

        //header
        $this->Image('./src/assets/images/logokiri.png', 775, 50, 150, 40);
        $this->Image('./src/assets/images/logokanan.png', 80, 40, 60, 60);
        $this->SetFont("", "B", 15);
        $this->MultiCell(0, 12, 'E - Perjadin');
        $this->Cell(0, 1, " ", "B");
        $this->Ln(20);
        $this->SetFont("", "B", 12);
        $this->SetX(20);
        $this->Cell(0, 10, 'LAPORAN PENGELUARAN', 0, 1, 'C');
        $this->Ln(40);
        $this->SetFont("", "B", 10);
        $this->SetX(100);
        $this->Cell(138, 1, 'Periode ' . $_GET['from'] . ' s/d ' . $_GET['to'], 0, 1, 'R');
        $this->Ln(10);
        $this->SetLeftMargin(75, 20);
        $h = 20;
        $left = 40;
        $top = 80;
        #tableheader
        $this->SetFont('Arial', 'B', 10);
        $this->SetFillColor(200, 200, 200);
        $left = $this->GetX();
        $this->Cell(20, $h, 'NO', 1, 0, 'L', true);
        $this->SetX($left += 20);
        $this->Cell(75, $h, 'No. Surat', 1, 0, 'C', true,);
        $this->SetX($left += 75);
        $this->Cell(100, $h, 'Nama', 1, 0, 'C', true);
        $this->SetX($left += 100);
        $this->Cell(100, $h, 'NIP', 1, 0, 'C', true);
        $this->SetX($left += 100);
        $this->Cell(100, $h, 'Tanggal Berangkat', 1, 0, 'C', true);
        $this->SetX($left += 100);
        $this->Cell(100, $h, 'Tanggal Selesai', 1, 0, 'C', true);
        $this->SetX($left += 100);
        $this->Cell(100, $h, 'Lama Dinas', 1, 0, 'C', true);
        $this->SetX($left += 100);
        $this->Cell(100, $h, 'Total Biaya', 1, 0, 'C', true);
        $this->SetX($left += 100);
        $this->Cell(150, $h, 'Kegiatan Perjadin', 1, 1, 'C', true,);
        // $this->Ln(2);

        $this->SetFont('Arial', '', 9);
        $this->SetWidths(array(20, 75, 100, 100, 100, 100, 100, 100, 150));
        $this->SetAligns(array('C', 'L', 'L', 'L', 'L', 'L', 'L', 'L', 'L'));
        $no = 1;
        $this->SetFillColor(255);

        foreach ($this->data as $baris) {
            $this->Row(
                array(
                    $no++,
                    $baris['no_surat_tugas'],
                    $baris['nama_pegawai'],
                    $baris['nip'],
                    $baris['tanggal_berangkat'],
                    $baris['tanggal_selesai'],
                    $baris['lama_dinas'],
                    $total_biaya = 'Rp ' . number_format($baris['total_biaya_perjadin'], 2, ',', '.'),
                    $baris['kegiatan_perjadin'],
                )
            );
        }
    }

    public function printPDF()
    {

        if ($this->options['paper_size'] == "F4") {
            $a = 8.3 * 72; //1 inch = 72 pt
            $b = 13.0 * 72;
            parent::__construct($this->options['orientation'], "pt", array($a, $b));
        } else {
            parent::__construct($this->options['orientation'], "pt", $this->options['paper_size']);
        }

        $this->SetAutoPageBreak(false);
        $this->AliasNbPages();
        $this->SetFont("helvetica", "B", 10);
        //$this->AddPage();

        $this->rptDetailData();

        $this->Output($this->options['filename'], $this->options['destinationfile']);
    }


    private $widths;
    private $aligns;


    function SetWidths($w)
    {
        //Set the array of column widths
        $this->widths = $w;
    }

    function SetAligns($a)
    {
        //Set the array of column alignments
        $this->aligns = $a;
    }

    function Row($data)
    {
        //Calculate the height of the row
        $nb = 0;
        for ($i = 0; $i < count($data); $i++)
            $nb = max($nb, $this->NbLines($this->widths[$i], $data[$i]));
        $h = 20 * $nb;
        //Issue a page break first if needed
        $this->CheckPageBreak($h);
        //Draw the cells of the row
        for ($i = 0; $i < count($data); $i++) {
            $w = $this->widths[$i];
            $a = isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
            //Save the current position
            $x = $this->GetX();
            $y = $this->GetY();
            //Draw the border
            $this->Rect($x, $y, $w, $h);
            //Print the text
            $this->MultiCell($w, 15, $data[$i], 0, $a);
            //Put the position to the right of the cell
            $this->SetXY($x + $w, $y);
        }
        //Go to the next line
        $this->Ln($h);
    }

    function CheckPageBreak($h)
    {
        //If the height h would cause an overflow, add a new page immediately
        if ($this->GetY() + $h > $this->PageBreakTrigger)
            $this->AddPage($this->CurOrientation);
    }

    function NbLines($w, $txt)
    {
        //Computes the number of lines a MultiCell of width w will take
        $cw = &$this->CurrentFont['cw'];
        if ($w == 0)
            $w = $this->w - $this->rMargin - $this->x;
        $wmax = ($w - 2 * $this->cMargin) * 1000 / $this->FontSize;
        $s = str_replace("\r", '', $txt);
        $nb = strlen($s);
        if ($nb > 0 and $s[$nb - 1] == "\n")
            $nb--;
        $sep = -1;
        $i = 0;
        $j = 0;
        $l = 0;
        $nl = 1;
        while ($i < $nb) {
            $c = $s[$i];
            if ($c == "\n") {
                $i++;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
                continue;
            }
            if ($c == ' ')
                $sep = $i;
            $l += $cw[$c];
            if ($l > $wmax) {
                if ($sep == -1) {
                    if ($i == $j)
                        $i++;
                } else
                    $i = $sep + 1;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
            } else
                $i++;
        }
        return $nl;
    }
} //end of class

//pilihan
$options = array(
    'filename' => 'laporan-penerimaan', //nama file penyimpanan, kosongkan jika output ke browser
    'destinationfile' => 'I', //I=inline browser (default), F=local file, D=download
    'paper_size' => 'Legal',    //paper size: F4, A3, A4, A5, Letter, Legal
    'orientation' => 'L', //orientation: P=portrait, L=landscape
);

$tabel = new FPDF_AutoWrapTable($dataLaporan, $options);
$tabel->printPDF();
