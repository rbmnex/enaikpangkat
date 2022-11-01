<?php

namespace App\Http\Controllers\Urussetia;

use App\Http\Controllers\Controller;
use App\Models\Mykj\ListPegawai2;
use App\Models\Mykj\Perkhidmatan;
use DateTime;
use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf;
use App\Http\Controllers\Common\CommonController;
use App\Models\File;
use App\Models\MyKj\Cuti;
use App\Models\Mykj\Gaji;
use App\Models\MyKj\Harta;
use App\Models\Mykj\Kelayakan;
use App\Models\MyKj\Pengalaman;
use App\Models\Mykj\Peristiwa;
use App\Models\MyKj\Waris;
use App\Models\Permohonan\Harta as PermohonanHarta;
use App\Models\Permohonan\Pemohon;
use App\Models\Permohonan\Pertubuhan;
use App\Models\Permohonan\PinjamanPendidikan;
use App\Models\Profail\Peribadi;
use App\Models\Urussetia\Calon;
use App\Models\Pink\LampiranKursus;
use App\Models\Pink\LampiranProjek;
use App\Models\Pink\LampiranBebanKerja;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
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
      $nokp = $request->input('kp');

        $access = $this->verify_applicant($nokp,$id);

        if(!$access) {
            return view('form.message',['message' => 'Anda Tidak Layak Untuk Mengambil Permohonan Ini!']);
        }


        $profile = NULL;
        $pemohon = NULL;

        $user = User::where('nokp',$nokp)->first();

        if(empty($user)) {
            User::upsert($nokp);
            $user = User::where('nokp',$nokp)->first();

            $profile = Peribadi::where('users_id',$user->id)->where('flag',1)->where('delete_id',0)->first();

            $pemohon = new Pemohon;
            $pemohon->flag = 1;
            $pemohon->delete_id = 0;
            $pemohon->id_permohonan = $id;
            $pemohon->id_peribadi = $profile->id;
            $pemohon->created_by = $nokp;
            $pemohon->updated_by = $nokp;
            $pemohon->status = Pemohon::NOT_SUBMITTED;
            $pemohon->user_id = $user->id;
            $pemohon->save();
        } else {
            $pemohon = Pemohon::where('id_permohonan', $id)->where('user_id',$user->id)->first();

            if($pemohon) {
                $profile = Peribadi::find($pemohon->id_peribadi);

                if($pemohon->status == Pemohon::NOT_SUBMITTED) {
                    $profile = Peribadi::update_peribadi($profile,$nokp);
                } else {
                    return view('form.message',['message' => 'Anda Sudah Menghantar Pemohonan Ini Dan Sedang Diproses, Diharap Sabar Menunggu Keputusan!']);
                }

            } else {
                $profile = Peribadi::recreate($user->id,$nokp);

                $pemohon = new Pemohon;
                $pemohon->flag = 1;
                $pemohon->delete_id = 0;
                $pemohon->id_permohonan = $id;
                $pemohon->id_peribadi = $profile->id;
                $pemohon->created_by = $nokp;
                $pemohon->updated_by = $nokp;
                $pemohon->status = Pemohon::NOT_SUBMITTED;
                $pemohon->user_id = $user->id;
                $pemohon->save();
            }
        }

        $maklumat = $this->load_info($profile,$nokp,$pemohon);

        return view('form.ukp12',[
            "profile" => $maklumat,
            "pemohon_id" =>$pemohon->id
        ]);
    }

    public function lampiran2pdf($ic) 
    {
 
    

        $model=Perkhidmatan::where('nokp',$ic)->get();
    
    

        $pdf = Pdf::loadView('urussetia.lampiran.pdf.lampiran2', compact('model'));
        return $pdf->stream("dompdf_out.pdf", array("Attachment" => false, 'enable_remote' => true));
        exit(0);
    }

    public function lampiran3pdf($ic) 
    {
        $model= [];
        $mula_khidmat ='';

        $model=ListPegawai2::getMaklumatPegawai($ic);
        $mula_khidmat=Perkhidmatan::where('nokp',$ic)->where('kod_kumpulan',3)->orderBy('tkh_lantik', 'asc')->first();
        $mula_gred_hakiki=Perkhidmatan::where('nokp',$ic)->where('kod_kumpulan',3)->where('status_perkhidmatan','H')->orderBy('tkh_lantik', 'asc')->first();
        $sektor_awam_mula = Pengalaman::where('nokp',$ic)->orderBy('tkh_mula','asc')->first();
        $sektor_awam_tamat = Pengalaman::where('nokp',$ic)->orderBy('tkh_tamat','desc')->first();
        $date1 = new DateTime($sektor_awam_mula->tkh_mula);
        $date2 = new DateTime($sektor_awam_tamat->tkh_tamat);
        $tempoh_awam = $date1->diff($date2);
  $pengalaman = DB::connection('pgsqlmykj')->table('public.pengalaman as p')
                                         ->leftJoin('public.l_aktiviti as la','p.kod_aktiviti','la.kod_aktiviti')->select('p.kod_aktiviti','la.aktiviti')
                                        ->where('p.nokp',$ic)
                                        ->where('p.kod_aktiviti','>=',23)
                                        ->orderBy('p.kod_aktiviti')
                                        ->groupBy('p.kod_aktiviti','la.aktiviti')
                                        ->distinct()
                                        ->get();
        $pengalaman_mula = DB::connection('pgsqlmykj')->table('public.pengalaman as p')
                                         ->select('p.kod_aktiviti','p.tkh_mula','p.tkh_tamat')
                                        ->where('p.nokp',$ic)
                                        ->where('p.kod_aktiviti','>=',23)
                                        ->orderBy('p.kod_aktiviti')
                                        ->groupBy('p.kod_aktiviti','p.tkh_mula','p.tkh_tamat')
                                        ->distinct()
                                        ->get();


        $pdf = Pdf::loadView('admin.user.resume.index', compact('model','mula_khidmat','mula_gred_hakiki','tempoh_awam','pengalaman','pengalaman_mula'));
        return $pdf->stream("dompdf_out.pdf", array("Attachment" => false, 'enable_remote' => true));
        exit(0);

    }public function lampiran4pdf($ic) 
    {
        $model= [];
        $mula_khidmat ='';

        $model=ListPegawai2::getMaklumatPegawai($ic);
        $mula_khidmat=Perkhidmatan::where('nokp',$ic)->where('kod_kumpulan',3)->orderBy('tkh_lantik', 'asc')->first();
        $mula_gred_hakiki=Perkhidmatan::where('nokp',$ic)->where('kod_kumpulan',3)->where('status_perkhidmatan','H')->orderBy('tkh_lantik', 'asc')->first();
        $sektor_awam_mula = Pengalaman::where('nokp',$ic)->orderBy('tkh_mula','asc')->first();
        $sektor_awam_tamat = Pengalaman::where('nokp',$ic)->orderBy('tkh_tamat','desc')->first();
        $date1 = new DateTime($sektor_awam_mula->tkh_mula);
        $date2 = new DateTime($sektor_awam_tamat->tkh_tamat);
        $tempoh_awam = $date1->diff($date2);
  $pengalaman = DB::connection('pgsqlmykj')->table('public.pengalaman as p')
                                         ->leftJoin('public.l_aktiviti as la','p.kod_aktiviti','la.kod_aktiviti')->select('p.kod_aktiviti','la.aktiviti')
                                        ->where('p.nokp',$ic)
                                        ->where('p.kod_aktiviti','>=',23)
                                        ->orderBy('p.kod_aktiviti')
                                        ->groupBy('p.kod_aktiviti','la.aktiviti')
                                        ->distinct()
                                        ->get();
        $pengalaman_mula = DB::connection('pgsqlmykj')->table('public.pengalaman as p')
                                         ->select('p.kod_aktiviti','p.tkh_mula','p.tkh_tamat')
                                        ->where('p.nokp',$ic)
                                        ->where('p.kod_aktiviti','>=',23)
                                        ->orderBy('p.kod_aktiviti')
                                        ->groupBy('p.kod_aktiviti','p.tkh_mula','p.tkh_tamat')
                                        ->distinct()
                                        ->get();


        $pdf = Pdf::loadView('admin.user.resume.index', compact('model','mula_khidmat','mula_gred_hakiki','tempoh_awam','pengalaman','pengalaman_mula'));
        return $pdf->stream("dompdf_out.pdf", array("Attachment" => false, 'enable_remote' => true));
        exit(0);
    }public function document($ic) 
    {
        $model= [];
        $mula_khidmat ='';

        $model=ListPegawai2::getMaklumatPegawai($ic);
        $mula_khidmat=Perkhidmatan::where('nokp',$ic)->where('kod_kumpulan',3)->orderBy('tkh_lantik', 'asc')->first();
        $mula_gred_hakiki=Perkhidmatan::where('nokp',$ic)->where('kod_kumpulan',3)->where('status_perkhidmatan','H')->orderBy('tkh_lantik', 'asc')->first();
        $sektor_awam_mula = Pengalaman::where('nokp',$ic)->orderBy('tkh_mula','asc')->first();
        $sektor_awam_tamat = Pengalaman::where('nokp',$ic)->orderBy('tkh_tamat','desc')->first();
     
        $date1 = new DateTime($sektor_awam_mula->tkh_mula);
        $date2 = new DateTime($sektor_awam_tamat->tkh_tamat);
        $tempoh_awam = $date1->diff($date2);

           // echo '<pre>';
           //  print_r($tempoh_awam);
           //  echo '</pre>';
           //  die();
        $pengalaman = DB::connection('pgsqlmykj')->table('public.pengalaman as p')
                                         ->leftJoin('public.l_aktiviti as la','p.kod_aktiviti','la.kod_aktiviti')->select('p.kod_aktiviti','la.aktiviti')
                                        ->where('p.nokp',$ic)
                                        ->where('p.kod_aktiviti','>=',23)
                                        ->orderBy('p.kod_aktiviti')
                                        ->groupBy('p.kod_aktiviti','la.aktiviti')
                                        ->distinct()
                                        ->get();
        $pengalaman_mula = DB::connection('pgsqlmykj')->table('public.pengalaman as p')
                                         ->select('p.kod_aktiviti','p.tkh_mula','p.tkh_tamat')
                                        ->where('p.nokp',$ic)
                                        ->where('p.kod_aktiviti','>=',23)
                                        ->orderBy('p.kod_aktiviti')
                                        ->groupBy('p.kod_aktiviti','p.tkh_mula','p.tkh_tamat')
                                        ->distinct()
                                        ->get();

        $lampiran_kursus = LampiranKursus::where('nokp',$ic)->get();
        $lampiran_beban = LampiranBebanKerja::where('nokp',$ic)->get();
        $lampiran_projek = LampiranProjek::where('nokp',$ic)->get();

                    
        $pdf = Pdf::loadView('admin.user.resume.index', compact('model','mula_khidmat','mula_gred_hakiki','tempoh_awam','pengalaman','pengalaman_mula','lampiran_kursus','lampiran_beban','lampiran_projek'));
        return $pdf->stream("dompdf_out.pdf", array("Attachment" => false, 'enable_remote' => true));
        exit(0);
    }

    public function lampiran2(Request $request) 
    {
         $model= [];

        if($request->input('nokp')){
            $model=ListPegawai2::getMaklumatPegawai($request->input('nokp'));
           // $tmp = Perkhidmatan::where('nokp', $ic)->where('kod_gred','J41')->first();
            // echo '<pre>';
            // print_r($model);
            // echo '</pre>';
            // die();
        }
        

        
        return view('urussetia/lampiran/lampiran2', [
            'user' => $model
        ]);
    }
    
    public function lampiran3($ic) 
    {
        $model= [];
        $mula_khidmat ='';

       
        $lampiran_tugas=LampiranBebanKerja::where('nokp',$ic)->get();
      


         $path = 'documents/';
        //$filename = 'Surat_Jemputan_-_' . $a->id . '.odt';
        $filenamePDF = 'lbk-' . $lampiran_tugas->user_id . '.pdf';

        return redirect($path. '' . $filenamePDF);
    
    }

    public function lampiran4($ic) 
    {
        $model= [];
        $mula_khidmat ='';

        $model=ListPegawai2::getMaklumatPegawai($ic);
        $mula_khidmat=Perkhidmatan::where('nokp',$ic)->where('kod_kumpulan',3)->orderBy('tkh_lantik', 'asc')->first();
        $mula_gred_hakiki=Perkhidmatan::where('nokp',$ic)->where('kod_kumpulan',3)->where('status_perkhidmatan','H')->orderBy('tkh_lantik', 'asc')->first();
        $sektor_awam_mula = Pengalaman::where('nokp',$ic)->orderBy('tkh_mula','asc')->first();
        $sektor_awam_tamat = Pengalaman::where('nokp',$ic)->orderBy('tkh_tamat','desc')->first();
        $date1 = new DateTime($sektor_awam_mula->tkh_mula);
        $date2 = new DateTime($sektor_awam_tamat->tkh_tamat);
        $tempoh_awam = $date1->diff($date2);
  $pengalaman = DB::connection('pgsqlmykj')->table('public.pengalaman as p')
                                         ->leftJoin('public.l_aktiviti as la','p.kod_aktiviti','la.kod_aktiviti')->select('p.kod_aktiviti','la.aktiviti')
                                        ->where('p.nokp',$ic)
                                        ->where('p.kod_aktiviti','>=',23)
                                        ->orderBy('p.kod_aktiviti')
                                        ->groupBy('p.kod_aktiviti','la.aktiviti')
                                        ->distinct()
                                        ->get();
        $pengalaman_mula = DB::connection('pgsqlmykj')->table('public.pengalaman as p')
                                         ->select('p.kod_aktiviti','p.tkh_mula','p.tkh_tamat')
                                        ->where('p.nokp',$ic)
                                        ->where('p.kod_aktiviti','>=',23)
                                        ->orderBy('p.kod_aktiviti')
                                        ->groupBy('p.kod_aktiviti','p.tkh_mula','p.tkh_tamat')
                                        ->distinct()
                                        ->get();


        $pdf = Pdf::loadView('admin.user.resume.index', compact('model','mula_khidmat','mula_gred_hakiki','tempoh_awam','pengalaman','pengalaman_mula'));
        return $pdf->stream("dompdf_out.pdf", array("Attachment" => false, 'enable_remote' => true));
        exit(0);
    }

      public function email(Request $request) {
        //$kod_jawatan = $request->input('kod_jawatan');

         // $pegawais=DB::connection('pgsqlmykj')->table('list_pegawai_naikpangkat as np')
         //    ->select('np.nokp','np.nama','np.email')
         //    ->whereIn('np.nokp',$list_nokp)->get();
       $content = [
                    
                   
                ];
                Mail::mailer('smtp')->send('mail.lampiran-mail',$content,function($message) {
                    // testing purpose
                    $message->to('haryana@vn.net.my');

                    
                    $message->subject('KEMASKINI LAMPIRAN');

                });

            

          
        

        return response()->json([
            'success' => 1,
            'data' => []
        ]);
    }

    


}
