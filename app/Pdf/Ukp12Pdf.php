<?php

namespace App\Pdf;

use Codedge\Fpdf\Fpdf\Fpdf;

class Ukp12Pdf extends Fpdf {
    // Page footer
    function Footer() {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,''.$this->PageNo().'/{nb}',0,0,'C');
    }

    function kepala() {
        $this->SetFont('Arial','B',12);
        $this->Cell(0,10,'JKR/UKP/12',0,0,'R');
        $this->Ln(4);
        $this->SetFont('Arial','BI',8);
        $this->Cell(0,10,'Pindaan 1/2021',0,0,'R');
        //$this->SetY(1);
        $this->Image(asset('images/jkr_logo.png') ,95,20,25,15);
        $this->Ln(20);
        $this->SetFont('Arial','',10);
        $this->Cell(0,10,'Pengarah',0,0,'L');
        $this->Ln(4);
        $this->Cell(0,10,'Cawangan Dasar & Pengurusan Korporat',0,0,'L');
        $this->Ln(4);
        $this->Cell(0,10,'Ibu Pejabat JKR Malaysia',0,0,'L');
        $this->Ln(4);
        $this->Cell(0,10,'Tingkat 29, Blok G, Menara Kerja Raya',0,0,'L');
        $this->Ln(4);
        $this->Cell(0,10,'No.6, Jalan Sultan Salahuddin',0,0,'L');
        $this->Ln(4);
        $this->SetFont('Arial','B',10);
        $this->Cell(0,10,'50480 KUALA LUMPUR',0,0,'L');
        $this->Ln(4);
        $this->SetFont('Arial','',10);
        $this->Cell(0,10,'(u.p Urus Setia Kenaikan Pangkat JKR)',0,0,'L');
        $this->Ln(8);
        $this->Cell(0,10,'Tuan / Puan,',0,0,'L');
        $this->Ln(8);
    }

    function isi($input = array()) {
        $this->SetFont('Arial','B',10);
        $this->Cell(50,10,'URUSAN',0,0,'L');
        $this->Cell(2,10,':',0,0,'C');
        $this->Cell(0,10,'PEMANGKUAN GRED ',0,0,'L');
        $this->Ln(5);
        $this->Cell(50,10,'JAWATAN',0,0,'L');
        $this->Cell(2,10,':',0,0,'C');
        $this->Cell(0,10,'',0,0,'L');
        $this->Ln(8);
        $this->SetFont('Arial','',10);
        $this->Cell(0,10,'Saya dengan sukacita memohon untuk dipertimbangkan bagi urusan seperti yang dinyatakan di atas',0,0,'L');
        $this->Ln(4);
        $this->Cell(0,10,'Butir-butir peribadi saya adalah seperti berikut:',0,0,'L');
        $this->Ln(8);
    }

    function butirPeribadi($input = array()) {
        $this->SetFont('Arial','B',10);
        $this->Cell(15,10,' I.',0,0,'L');
        $this->Cell(0,10,'BUTIR-BUTIR PERIBADI',0,0,'L');
        $this->Ln(7);
        $this->SetFont('Arial','',10);
        $this->Cell(0,10,' Nama : ','LTR',0,'L');
        $this->Ln(10);
        $this->Cell(100,10,' No. Kad Pengenalan : (Lama) ','LT',0,'L');
        $this->Cell(0,10,'(Baru)','TR',0,'L');
        $this->Ln(10);
        $this->Cell(0,4,'','LTR',0,'L');
        $this->Ln(4);
        $this->Cell(0,4,' Jawatan dan gred sekarang                                 : ','LR',0,'L');
        $this->Ln(4);
        $this->Cell(0,4,' Tarikh lantikan perkhidmatan (semasa J41)        : ','LR',0,'L');
        $this->Ln(4);
        $this->Cell(0,4,' Tarikh * disahkan jawatan / naik pangkat terkini  : ','LR',0,'L');
        $this->Ln(4);
        $this->Cell(0,4,' Umur persaraan wajib                                          : ','LR',0,'L');
        $this->Ln(4);
        $this->Cell(0,3,'','LBR',0,'L');
        $this->Ln(3);
        $this->Cell(0,10,' Pengesahan * Pengesahan Cuti Tanpa Gaji / Cuti Separuh Gaji / Cuti Belajar Bergaji Penuh / Cuti Belajar Separuh Gaji','LR',0,'L');
        $this->Ln(10);
        $this->Cell(15,5,' ADA','L',0,'L');
        $this->Cell(5,5,'',1,0,'L');
        $this->Cell(5,5,'',0,0,'L');
        $this->Cell(18,5,' TIADA',0,0,'L');
        $this->Cell(5,5,'',1,0,'L');
        $this->Cell(0,5,'','R',0,'L');
        $this->Ln(5);
        $this->Cell(0,3,'','LR',0,'L');
        $this->Ln(3);
        $this->SetFont('Arial','B',10);
        $this->Cell(15,5,'','L',0,'L');
        $this->Cell(50,5,'Cuti',1,0,'C');
        $this->Cell(30,5,'Tarikh Mula','TBR',0,'C');
        $this->Cell(30,5,'Tarikh Akhir','TBR',0,'C');
        $this->Cell(0,5,'','R',0,'C');
        $this->Ln(5);
        $this->SetFont('Arial','',10);
        $this->Cell(15,5,'','L',0,'L');
        $this->Cell(50,5,'Cuti Tanpa Gaji','RL',0,'L');
        $this->Cell(30,5,'','R',0,'L');
        $this->Cell(30,5,'','R',0,'L');
        $this->Cell(0,5,'','R',0,'L');
        $this->Ln(5);
        $this->Cell(15,5,'','L',0,'L');
        $this->Cell(50,5,'','BRL',0,'L');
        $this->Cell(30,5,'','RB',0,'L');
        $this->Cell(30,5,'','RB',0,'L');
        $this->Cell(0,5,'','R',0,'C');
        $this->Ln(5);
        $this->Cell(15,5,'','L',0,'L');
        $this->Cell(50,5,'Cuti Separuh Gaji','RL',0,'L');
        $this->Cell(30,5,'','R',0,'L');
        $this->Cell(30,5,'','R',0,'L');
        $this->Cell(0,5,'','R',0,'C');
        $this->Ln(5);
        $this->Cell(15,5,'','L',0,'L');
        $this->Cell(50,5,'','BRL',0,'L');
        $this->Cell(30,5,'','RB',0,'L');
        $this->Cell(30,5,'','RB',0,'L');
        $this->Cell(0,5,'','R',0,'C');
        $this->Ln(5);
        $this->Cell(15,5,'','L',0,'L');
        $this->Cell(50,5,'Cuti Belajar Bergaji Penuh','RL',0,'L');
        $this->Cell(30,5,'','R',0,'L');
        $this->Cell(30,5,'','R',0,'L');
        $this->Cell(0,5,'','R',0,'C');
        $this->Ln(5);
        $this->Cell(15,5,'','L',0,'L');
        $this->Cell(50,5,'/ Cuti Belajar Separuh Gaji','BRL',0,'L');
        $this->Cell(30,5,'','RB',0,'L');
        $this->Cell(30,5,'','RB',0,'L');
        $this->Cell(0,5,'','R',0,'C');
        $this->Ln(5);
        $this->Cell(0,5,'','RL',0,'C');
        $this->Ln(5);
        $this->SetFont('Arial','BI',10);
        $this->Cell(0,5,' * Surat Kelulusan Cuti yang disahkan perlu diserta bersama','RLB',0,'L');
        $this->Ln(5);
        $this->Cell(0,25,'','',0,'C');
    }

    public static function print() {
        $pdf = new Ukp12Pdf;
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->kepala();
        $pdf->isi(array());
        $pdf->butirPeribadi();
        $pdf->AddPage();
        $pdf->Output();
    }
}
