<?php

namespace App\Http\Controllers\Urussetia;

use App\Http\Controllers\Controller;
use App\Models\Mykj\ListPegawai2;
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
            // echo '<pre>';
            // print_r($model);
            // echo '</pre>';
            // die();
        }
        
        
        return view('mockup4', [
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

        $model=ListPegawai2::getMaklumatPegawai($ic);

        // echo '<pre>';
        // print_r($model);
        // echo '</pre>';
        // die();

        $pdf = Pdf::loadView('admin.user.resume.index', compact('model'));
        return $pdf->stream("dompdf_out.pdf", array("Attachment" => false));
        exit(0);
    }
}
