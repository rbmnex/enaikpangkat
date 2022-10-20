<?php

namespace App\Http\Controllers\Urussetia;

use App\Http\Controllers\Controller;
use App\Models\Mykj\ListPegawai2;
use App\Models\Mykj\Perkhidmatan;

use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf;


use Pdf;

class ResumeController extends Controller
{
    protected $fpdf;
    public function __construct()
    {
        $this->fpdf = new Fpdf;
    }

   public function mockup4(Request $request
    ){
        $model= [];

        if($request->input('nokp')){
            $model=ListPegawai2::getMaklumatPegawai($request->input('nokp'));
           // $tmp = Perkhidmatan::where('nokp', $ic)->where('kod_gred','J41')->first();
            // echo '<pre>';
            // print_r($model);
            // echo '</pre>';
            // die();
        }
        

        
        return view('mockup4', [
            'user' => $model
        ]);
    }

       public function lampiran(Request $request){
        $model= [];

        if($request->input('nokp')){
            $model=ListPegawai2::getMaklumatPegawai($request->input('nokp'));
           // $tmp = Perkhidmatan::where('nokp', $ic)->where('kod_gred','J41')->first();
            // echo '<pre>';
            // print_r($model);
            // echo '</pre>';
            // die();
        }
        

        
        return view('lampiran', [
            'user' => $model
        ]);
    }



    // public function document()
    // {
    //     $this->fpdf->SetFont('Arial', 'B', 15);
    //     $this->fpdf->AddPage("L", ['100', '100']);
    //     $this->fpdf->Text(10, 10, "Resume");

    //     $this->fpdf->Output();

    //     exit;
    // }

    public function document($ic) 
    {
        $model= [];
        $mula_khidmat ='';

        $model=ListPegawai2::getMaklumatPegawai($ic);
        $mula_khidmat=Perkhidmatan::where('nokp',$ic)->where('kod_kumpulan',3)->orderBy('tkh_lantik', 'asc')->first();
        $mula_gred_hakiki=Perkhidmatan::where('nokp',$ic)->where('kod_kumpulan',3)->where('status_perkhidmatan','H')->orderBy('tkh_lantik', 'asc')->first();
        
        // echo '<pre>';
        // print_r($model);
        // echo '</pre>';
        // die();

        $pdf = Pdf::loadView('admin.user.resume.index', compact('model','mula_khidmat','mula_gred_hakiki'));
        return $pdf->stream("dompdf_out.pdf", array("Attachment" => false));
        exit(0);
    }

      public function email($ic) 
    {
        $model= [];
        $mula_khidmat ='';

        $model=ListPegawai2::getMaklumatPegawai($ic);
        $mula_khidmat=Perkhidmatan::where('nokp',$ic)->where('kod_kumpulan',3)->orderBy('tkh_lantik', 'asc')->first();
        $mula_gred_hakiki=Perkhidmatan::where('nokp',$ic)->where('kod_kumpulan',3)->where('status_perkhidmatan','H')->orderBy('tkh_lantik', 'asc')->first();
        
        // echo '<pre>';
        // print_r($model);
        // echo '</pre>';
        // die();

        $pdf = Pdf::loadView('admin.user.resume.index', compact('model','mula_khidmat','mula_gred_hakiki'));
        return $pdf->stream("dompdf_out.pdf", array("Attachment" => false));
        exit(0);
    }


}
