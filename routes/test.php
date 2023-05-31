<?php

use App\Http\Controllers\Form\ViewController;
use App\Models\File;
use App\Models\Permohonan\Cuti;
use App\Models\Permohonan\Harta;
use App\Models\Permohonan\Kompetensi;
use App\Models\Permohonan\Pemohon;
use App\Models\Permohonan\PinjamanPendidikan;
use App\Models\Permohonan\Professional;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use setasign\Fpdi\Fpdi;

Route::get('/test/merge-file/{id}',function($id) {
    $folder = Str::random(10);
    $files = Storage::disk('web')->makeDirectory($folder);
    $pemohon = Pemohon::with('pemohonPeribadi','pemohonPermohonan')->find($id);
    $mykj_url = 'http://10.8.80.68/';

    if($pemohon->jenis_penempatan == 2) {
        $file = File::find($pemohon->form_file);
        if($file) {
            Storage::disk('web')->put($folder.'/'.$file->filename,base64_decode($file->content_bytes));
        }
    } else {
        $file = File::find($pemohon->pengesahan_cuti);
        if($file) {
            Storage::disk('web')->put($folder.'/'.$file->filename,base64_decode($file->content_bytes));
        }

        // $view = new ViewController();
        // $data = $view->load_dataform(10);
        // $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('pdf.ukp12', $data, []);
        // $pdf->save(Storage::disk('web')->path($folder.'/ukp12.pdf'));
    }

    //cuti
    $cuti_records = Cuti::where('id_pemohon',$id)->get();
    foreach($cuti_records as $cuti) {
        if(!empty($cuti->surat_kelulusan)) {
            $file = File::find($cuti->surat_kelulusan);
            $filename = preg_replace('/\s+/', '%20', $file->filename);
            $contents = file_get_contents($mykj_url.'upload_cuti/'.$pemohon->pemohonPeribadi->nokp.'/'.$filename);
            if($contents) {
                Storage::disk('web')->put($folder.'/'.$file->filename,$contents);
            }
        }
    }

    //pengistiharan harta
    $harta = Harta::where('id_pemohon',$id)->first();
    if($harta) {
        if(!empty($harta->surat_kelulusan_id)) {
            $file = File::find($harta->surat_kelulusan_id);
            if($file) {
                Storage::disk('web')->put($folder.'/'.$file->filename,base64_decode($file->content_bytes));
            }
        }
    }

    //profesional
    $rekod_professional = Professional::where('id_pemohon',$id)->get();
    foreach($rekod_professional as $pro) {
        if(!empty($pro->file_id)) {
            $file = File::find($pro->file_id);
            $filename = preg_replace('/\s+/', '%20', $file->filename);
            $contents = file_get_contents($mykj_url.'upload_kelayakan/'.$pemohon->pemohonPeribadi->nokp.'/'.$filename);
            if($contents) {
                Storage::disk('web')->put($folder.'/'.$file->filename,$contents);
            }
        }
    }
    // kompetensi
    $rekod_kompeten = Kompetensi::where('id_pemohon',$id)->get();
    foreach($rekod_kompeten as $komp) {
        if(!empty($komp->fail)) {
            $file = File::find($pro->fail);
            $filename = preg_replace('/\s+/', '%20', $file->filename);
            $contents = file_get_contents($mykj_url.'upload_kelayakan/'.$pemohon->pemohonPeribadi->nokp.'/'.$filename);
            if($contents) {
                Storage::disk('web')->put($folder.'/'.$file->filename,$contents);
            }
        }
    }
    // akuan pinjaman pendidikan
    $loan = PinjamanPendidikan::where('id_pemohon',$id)->where('flag',1)->where('delete_id',0)->first();
    if($loan) {
        if(!empty($loan->surat_perakuan)) {
            $file = File::find($loan->surat_perakuan);
            if($file) {
                Storage::disk('web')->put($folder.'/'.$file->filename,base64_decode($file->content_bytes));
            }
        }
    }

    $files = Storage::disk('web')->files($folder);
    $pdf = new Fpdi();

    foreach ($files as $file) {
        // set the source file and get the number of pages in the document
        $pageCount =  $pdf->setSourceFile(Storage::disk('web')->path($file));

        for ($i=0; $i < $pageCount; $i++) {
            //create a page
            $pdf->AddPage();
            //import a page then get the id and will be used in the template
            $tplId = $pdf->importPage($i+1);
            //use the template of the imporated page
            $pdf->useTemplate($tplId);
        }
    }

    Storage::disk('web')->deleteDirectory($folder);

    //return the generated PDF
    return $pdf->Output();
});

Route::get('/test/file/save',function(Request $request){
    $view = new ViewController();
    $data = $view->load_dataform(10);
    $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('pdf.ukp12', $data, []);
    $pdf->save(Storage::disk('web')->path('ukp12.pdf'));

});
