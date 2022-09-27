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
    }

    public static function print() {
        $pdf = new Ukp12Pdf;
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->kepala();
        $pdf->isi(array());
        $pdf->AddPage();
        $pdf->Output();
    }
}
