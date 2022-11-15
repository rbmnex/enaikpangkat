<?php

namespace App\Pdf;

use Codedge\Fpdf\Fpdf\Fpdf;

class Ukp13Pdf extends Fpdf {
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
        $this->Cell(0,10,'JKR/UKP/13',0,0,'R');
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

    function isi($input = NULL) {
        $this->SetFont('Arial','B',10);
        $this->Cell(50,10,'URUSAN',0,0,'L');
        $this->Cell(2,10,':',0,0,'C');
        $this->Cell(38,10,'NAIK PANGKAT GRED',0,0,'L');
        $this->Cell(0,10,empty($input) ? '' : $input->gred_memangku ,0,0,'L');
        $this->Ln(5);
        $this->Cell(50,10,'JAWATAN',0,0,'L');
        $this->Cell(2,10,':',0,0,'C');
        $this->Cell(0,10,empty($input) ? '' : $input->jawatan,0,0,'L');
        $this->Ln(8);
        $this->SetFont('Arial','',10);
        $this->Cell(0,10,'Saya dengan sukacita memohon untuk dipertimbangkan bagi urusan seperti yang dinyatakan di atas',0,0,'L');
        $this->Ln(4);
        $this->Cell(0,10,'Butir-butir peribadi saya adalah seperti berikut:',0,0,'L');
        $this->Ln(8);
    }

    function butirPeribadi($input = NULL) {

        $this->SetFont('Arial','B',10);
        $this->Cell(15,10,' I.',0,0,'L');
        $this->Cell(0,10,'BUTIR-BUTIR PERIBADI',0,0,'L');
        $this->Ln(7);
        $this->SetFont('Arial','',10);
        $this->Cell(15,10,' Nama : ','LT',0,'L');
        //empty($input) ? '' : $input->nama
        $this->Cell(0,10,empty($input) ? '' : $input->nama,'TR',0,'L');
        $this->Ln(10);
        $this->Cell(50,10,' No. Kad Pengenalan : (Lama) ','LT',0,'L');
        //empty($input) ? '' : $input->nokp_lama
        $this->Cell(50,10,empty($input) ? '' : $input->nokp_lama,'T',0,'L');
        $this->Cell(12,10,'(Baru) ','T',0,'L');
        //empty($input)? '' : $input->nokp_baru
        $this->Cell(0,10,empty($input)? '' : $input->nokp_baru,'TR',0,'L');
        $this->Ln(10);
        $this->Cell(0,4,'','LTR',0,'L');
        $this->Ln(4);
        $this->Cell(75,4,' Jawatan dan gred sekarang ','L',0,'L');
        $this->Cell(4,4,' : ',0,0,'L');
        $this->Cell(0,4,empty($input)? '' : $input->jawatan.' '.$input->gred,'R',0,'L');
        $this->Ln(4);
        $this->Cell(75,4,' Tarikh lantikan perkhidmatan (semasa J41) ','L',0,'L');
        $this->Cell(4,4,' : ',0,0,'L');
        $this->Cell(0,4,empty($input)? '' : \Carbon\Carbon::parse($input->tkh_lantikan_j41)->format('d-m-Y'),'R',0,'L');
        $this->Ln(4);
        $this->Cell(75,4,' Tarikh * disahkan jawatan / naik pangkat terkini ','L',0,'L');
        $this->Cell(4,4,' : ',0,0,'L');
        $this->Cell(0,4,empty($input)? '' : \Carbon\Carbon::parse($input->tkh_sah)->format('d-m-Y'),'R',0,'L');
        $this->Ln(4);
        $this->Cell(75,4,' Umur persaraan wajib ','L',0,'L');
        $this->Cell(4,4,' : ',0,0,'L');
        $this->Cell(0,4,empty($input) ? '' : $input->umur_besara,'R',0,'L');
        $this->Ln(4);
        $this->Cell(0,3,'','LBR',0,'L');
        $this->Ln(3);
        $this->Cell(0,10,' Pengesahan * Pengesahan Cuti Tanpa Gaji / Cuti Separuh Gaji / Cuti Belajar Bergaji Penuh / Cuti Belajar Separuh Gaji','LR',0,'L');
        $this->Ln(10);
        $this->Cell(15,5,' ADA','L',0,'L');
        $this->Cell(5,5,empty($input)? '' : (count($input->cuti) > 0 ? '/' : ''),1,0,'L');
        $this->Cell(5,5,'',0,0,'L');
        $this->Cell(18,5,' TIADA',0,0,'L');
        $this->Cell(5,5,empty($input)? '' : (count($input->cuti) < 1 ? '/' : ''),1,0,'L');
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
        //loop here
        $this->SetFont('Arial','',10);
        if(!empty($input)) {
            if(count($input->cuti) > 0) {
                foreach($input->cuti as $cuti) {
                    $this->Cell(15,5,'','L',0,'L');
                    $this->Cell(50,5,$cuti->jenis_cuti,'RL',0,'L');
                    $this->Cell(30,5,\Carbon\Carbon::parse($cuti->tkh_mula)->format('d-m-Y') ,'R',0,'L');
                    $this->Cell(30,5,\Carbon\Carbon::parse($cuti->tkh_tamat)->format('d-m-Y') ,'R',0,'L');
                    $this->Cell(0,5,'','R',0,'L');
                    $this->Ln(5);
                }
            } else {
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
            }
        } else {
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
        }

        $this->SetFont('Arial','BI',10);
        $this->Cell(0,5,' * Surat Kelulusan Cuti yang disahkan perlu diserta bersama','RLB',0,'L');
        $this->Ln(5);
        $this->Cell(0,7,'','LR',0,'C');
        $this->Ln(7);
        $this->SetFont('Arial','B',10);
        $this->Cell(0,4,'Pengesahan Butit-Butir Perkhidmatan','LR',0,'l');
        $this->Ln(4);
        $this->SetFont('Arial','I',10);
        $this->Cell(0,5,'Saya telah menyemak butir-butir perkhidmatan pegawai ini di atas dan disahkan betul','LR',0,'L');
        $this->Ln(5);
        $this->Cell(0,20,'','LR',0,'L');
        $this->Ln(20);
        $this->Cell(50,5,'','L',0,'L');
        $this->Cell(0,5,'...........................................................................','R',0,'L');
        $this->Ln(5);
        $this->SetFont('Arial','BI',10);
        $this->Cell(50,5,'','L',0,'L');
        $this->Cell(0,5,'Tandatangan dan Cop Kerani Perkhidmatan','R',0,'L');
        $this->Ln(5);
        $this->Cell(0,5,'','LRB',0,'L');
        $this->Ln(5);
        $this->SetFont('Arial','BI',10);
        $this->Cell(0,5,'* potong mana yang tidak berkenaan','',0,'L');
    }

    function pengistiharan_harta() {
        $this->SetFont('Arial','',10);
        $this->Cell(0,10,'','TLR',0,'L');
        $this->Ln(10);
        $this->Cell(30,20,' Alamat Tempat Bertugas : ','L',0,'L');
        $this->Cell(0,20,'CAWANGAN KERJA BANGUNAN AM 1
        IBU PEJABAT JKR MALAYSIA
        TINGKAT 13,13A & 17, MENARA PJD
        NO.50, JALAN TUN RAZAK
        50400 KUALA LUMPUR','RT',0,'L');
        $this->Ln(20);
        $this->Cell(30,5,'No. Telefon   : (Pejabat) ','L',0,'L');
        $this->Cell(0,5,'07-78902341','R',0,'L');
        $this->Ln(5);
        $this->Cell(30,5,'No. Faksimili : ','L',0,'L');
        $this->Cell(0,5,'07-78908901','R',0,'L');
        $this->Ln(5);
        $this->Cell(30,5,'No. Telefon (Bimbit) : ','L',0,'L');
        $this->Cell(0,5,'011-78915671','R',0,'L');
        $this->Ln(5);
        $this->Cell(30,5,'E-mel : ','R',0,'L');
        $this->Cell(0,5,'raihan_mambo@jkr.gov.my','L',0,'L');
        $this->Ln(5);
        $this->Cell(0,20,'','LRB',0,'L');
        $this->Ln(20);
        $this->Cell(0,10,'','LR',0,'L');
        $this->Ln(10);
        $this->Cell(0,10,'Pengisytiharan Harta','LR',0,'L');
        $this->Ln(10);
        $this->Cell(50,10,'Tarikh Akhir Pengisytiharan Harta Terkini : ','R',0,'L');
        $this->Cell(0,10,'10-10-2020','R',0,'L');
        $this->Ln(10);
        $this->SetFont('Arial','BI',10);
        $this->Cell(0,10,'* Kelulusan Pengisytiharan Harta (LAMPIRAN E yang dijana dari HRMIS) yang disahkan perlu disertakan bersama','LR',0,'L');
        $this->Ln(10);
        $this->Cell(0,10,'','LR',0,'L');
        $this->Ln(10);
        $this->Cell(0,10,'* Sila pastikan kelulusan Pengisytiharan Harta adalah sah dan tidak melebihi dari lima (5) tahun dari tarikh Pengisytiharan Harta terakhir','LR',0,'L');
        $this->Ln(10);
        $this->Cell(0,20,'','LRB',0,'L');
        $this->Ln(20);
    }

    public static function print($input) {
        $pdf = new Ukp13Pdf;
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->kepala();
        $pdf->isi($input);
        $pdf->butirPeribadi($input);
        //$pdf->AddPage();
        $pdf->Output('I','Permohonan_UKP13',true);
    }

    public static function print_test() {
        $pdf = new Ukp13Pdf;
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->pengistiharan_harta();
        $pdf->Output('I','Permohonan_UKP13',true);
    }
}
