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
use App\Models\Pink\LampiranPendedahan;
use App\Models\Pink\Resume;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Pdf;
use Yajra\DataTables\DataTables;


class ResumeController extends Controller
{
    protected $fpdf;
    public function __construct()
    {
        $this->fpdf = new Fpdf;
    }


    public function mockup4(Request $request){
          $model = Role::all();
   
        


        return view('mockup4')->with('roles',$model);
    }

    public function lampiran(Request $request){

        return view('urussetia.lampiran.lampiran',[

        ]);
    }

     public function terpilih(Request $request){
 // $model = Role::all();
  $dateline1 = Carbon::now();
  $dateline =Carbon::parse($dateline1)->addDays(5); 
 

        return view('urussetia.resume.senaraiterpilih');
    }


     public function senarai_pengguna(Request $request) {
        // echo '<pre>';
        // print_r($request->all()['search']['value']);
        // echo '</pre>';
        // die();

        $search = $request->all()['search']['value'];


        $model = ListPegawai2::with('getLampiran')->limit(10);

        if($search){
            $model->where('nokp', 'ilike', '%'.$search.'%')
            ->orWhereRaw("LOWER(nama) ilike '%".$search."%'")->limit(10)->get();
        }else{
            $model->get();
        }

                  return DataTables::of($model)
                ->setRowAttr([
                    'data-nama' => function($data) {
                        return $data->nama;
                    },
                    'data-kod_gred' => function($data) {
                        return $data->kod_gred;
                    },
                    'data-jawatan' => function($data) {
                        return $data->jawatan;
                    },
                    'data-nokp' => function($data) {
                        return $data->nokp;
                    },
                ])
                ->addColumn('nokp', function($data) {
                    // echo '<pre>';
                    // print_r($data);
                    // echo '</pre>';
                    // die();
                    return $data->nokp;
                })
                ->addColumn('nama', function($data) {
                    return $data->nama;
                })
                ->addColumn('kod_gred', function($data) {
                    return $data->kod_gred;
                })
                ->addColumn('jawatan', function($data) {
                    return $data->jawatan;
                })
                ->addColumn('status', function($data) {
                    $lbk = LampiranBebanKerja::select('nokp')->where('nokp', $data->nokp)->first() ? true : false;
                    $lk = LampiranKursus::select('nokp')->where('nokp', $data->nokp)->first() ? true : false;
                    $lp = LampiranProjek::select('nokp')->where('nokp', $data->nokp)->first() ? true : false;
                    $lpn = LampiranPendedahan::select('nokp')->where('nokp', $data->nokp)->first() ? true : false;

                    if($lbk && $lk && $lp && $lpn){
                        return '<div class="badge badge-primary">Lengkap</div>';
                    }else{
                        return '<div class="badge badge-danger">Tidak Lengkap</div>';
                    }
                })
                ->addColumn('aksi', function($data) {
                    return 1;
                })
                ->rawColumns([ 'status'])
                ->make(true);
    }

      public function senarai_terpilih(Request $request) {

        $search = $request->all()['search']['value'];

        $model = Resume::with('getLampiran')->limit(10);

        if($search){
            $model->where('nokp', 'ilike', '%'.$search.'%')
            ->orWhereRaw("LOWER(nama) ilike '%".$search."%'")->limit(10)->get();
        }else{
            // echo $model;
            // die();
            $model->get();
        }

                  return DataTables::of($model)
                ->setRowAttr([
                    'data-nama' => function($data) {
                        return $data->nama;
                    },
                    'data-kod_gred' => function($data) {
                        return $data->kod_gred;
                    },
                    'data-jawatan' => function($data) {
                        return $data->jawatan;
                    },
                    'data-nokp' => function($data) {
                        return $data->nokp;
                    },
                ])
                ->addColumn('nokp', function($data) {
                    // echo '<pre>';
                    // print_r($data);
                    // echo '</pre>';
                    // die();
                    return $data->nokp;
                })
                ->addColumn('nama', function($data) {
                    return $data->nama;
                })
                ->addColumn('kod_gred', function($data) {
                    return $data->kod_gred;
                })
                ->addColumn('jawatan', function($data) {
                    return $data->jawatan;
                })
                ->addColumn('status', function($data) {
                    $lbk = LampiranBebanKerja::select('nokp')->where('nokp', $data->nokp)->first() ? true : false;
                    $lk = LampiranKursus::select('nokp')->where('nokp', $data->nokp)->first() ? true : false;
                    $lp = LampiranProjek::select('nokp')->where('nokp', $data->nokp)->first() ? true : false;
                     $lpn = LampiranPendedahan::select('nokp')->where('nokp', $data->nokp)->first() ? true : false;

                    if($lbk && $lk && $lp && $lpn){
                        return '<div class="badge badge-primary">Lengkap</div>';
                    }else{
                        return '<div class="badge badge-danger">Tidak Lengkap</div>';
                    }
                })
                ->addColumn('aksi', function($data) {
                    return 1;
                })
                ->rawColumns([ 'status'])
                ->make(true);
    }

    public function carian_pengguna(Request $request){
        $data = [];
        $search_term = $request->input('q');
        $peribadi = DB::connection('pgsqlmykj')->table('list_pegawai2 as p')->select('p.*')->where('nokp', 'ilike', '%'.$search_term.'%')
            ->orWhereRaw("LOWER(nama) ilike '%".$search_term."%'")->limit(20)->get();

        if(count($peribadi) != 0){
            foreach($peribadi as $p){
                $data[] = array(
                    'id' => $p->nokp,
                    'text' => $p->nama.' - '.$p->nokp
                );
            }
        }

        return response()->json([
            'data' => $data
        ]);
    }

     public function carian_terpilih(Request $request){
        $data = [];
        $search_term = $request->input('q');
        $peribadi = DB::connection('pgsqlmykj')->table('list_pegawai2 as p')->select('p.*')->where('nokp', 'ilike', '%'.$search_term.'%')
            ->orWhereRaw("LOWER(nama) ilike '%".$search_term."%'")->limit(20)->get();

        if(count($peribadi) != 0){
            foreach($peribadi as $p){
                $data[] = array(
                    'id' => $p->nokp,
                    'text' => $p->nama.' - '.$p->nokp
                );
            }
        }

        return response()->json([
            'data' => $data
        ]);
    }



    public function open_lampiran(Request $request) {
        $user = Auth::user();
        //$nokp = $request->input('kp');
        $lampirankursus = LampiranKursus::where('nokp',$user->nokp)->get();
        $lampiranbeban = LampiranBebanKerja::where('nokp',$user->nokp)->get();
        $lampiranprojek = LampiranProjek::where('nokp',$user->nokp)->get();
        $lampiranpendedahan = LampiranPendedahan::where('nokp',$user->nokp)->where('kod_kategori',1)->get();
        $lampiranpencapaian = LampiranPendedahan::where('nokp',$user->nokp)->where('kod_kategori',2)->get();

        //$user = User::where('nokp',$nokp)->first();

        return view('urussetia.lampiran.lampiran',[
            "nokp"=>$user->nokp,
            "lampirankursus"=>$lampirankursus,
            "lampiranbeban"=>$lampiranbeban,
            "lampiranprojek"=>$lampiranprojek,
            "lampiranpendedahan"=>$lampiranpendedahan,
             "lampiranpencapaian"=>$lampiranpencapaian,
            "user"=>$user
        ]);
    }

     public function open(Request $request,$id) {
        $nokp = $request->input('kp');
        $lampirankursus = LampiranKursus::where('nokp',$nokp)->get();
        $lampiranbeban = LampiranBebanKerja::where('nokp',$nokp)->get();
        $lampiranprojek = LampiranProjek::where('nokp',$nokp)->get();
        $lampiranpendedahan = LampiranPendedahan::where('nokp',$nokp)->where('kod_kategori',1)->get();
        $lampiranpencapaian = LampiranPendedahan::where('nokp',$nokp)->where('kod_kategori',2)->get();


        $user = User::where('nokp',$nokp)->first();

        return view('urussetia.lampiran.lampiran',[
            "nokp"=>$nokp,
            "lampirankursus"=>$lampirankursus,
            "lampiranbeban"=>$lampiranbeban,
            "lampiranprojek"=>$lampiranprojek,
            "lampiranpendedahan"=>$lampiranpendedahan,
            "lampiranpencapaian"=>$lampiranpencapaian,
            "user"=>$user
        ]);
    }

        public function save_kursus(Request $request) {
         $nokp = Auth::user();
        $tajuk = $request->input('tajuk');
        $mula = $request->input('mula');
        $tamat = $request->input('tamat');
        $tempat = $request->input('tempat');
        $user = $request->input('user');
        $id = $request->input('id');
       //$id = $request->input('pemohonId');
        //$nokp = $request->input('nokp');
        if(!$id){
        $model = new LampiranKursus;
        $model->flag = 1;
        $model->delete_id = 0;
        $model->nokp = $nokp->nokp;
        $model->user_id = $user;
        $model->created_by = $nokp->nokp;
        $model->updated_by = $nokp->nokp;
         }else{
            $model = LampiranKursus::find($id);
        }
         $model->nama_kursus = $tajuk;
        $model->tkh_mula = $mula;
        $model->tkh_tamat = $tamat;
        $model->tempat = $tempat;

        if($model->save()) {
            return response()->json([
                 'success' => !$id ? 1 : 2,
                'data' => [
                    'tajuk' => $model->nama_kursus,
                    'mula' => $model->tkh_mula,
                    'tamat' => $model->tkh_tamat,
                    'tempat' => $model->tempat,
                    'nokp' =>$model->nokp,
                    'id' => $model->id
                ]
            ]);
        } else {
            return response()->json([
                'success' => 0,
                'data' => []
            ]);
        }
    }


     public function save_projek(Request $request) {
        $nokp = Auth::user();
        $tajuk = $request->input('tajuk');
        $kos = $request->input('kos');
        $user = $request->input('user');
         $id = $request->input('id');

          if(!$id){
        $model = new LampiranProjek;
        $model->flag = 1;
        $model->delete_id = 0;
        $model->created_by = $nokp->nokp;
        $model->nokp = $nokp->nokp;
        $model->user_id = $user;
        $model->created_by = $nokp->nokp;
        $model->updated_by = $nokp->nokp;
           }else{
            $model = LampiranProjek::find($id);
        }
        $model->nama_projek = $tajuk;
        $model->kos_projek = $kos;

        if($model->save()) {
            return response()->json([
                'success' => !$id ? 1 : 2,
                'data' => [
                    'tajuk' => $model->nama_projek,
                    'kos' => $model->kos_projek,
                    'id' => $model->id
                ]
            ]);
        } else {
            return response()->json([
                'success' => 0,
                'data' => []
            ]);
        }
    }

         public function save_pendedahan(Request $request) {
        $nokp = Auth::user();
        $tajuk = $request->input('tajuk');
        $user = $request->input('user');
        $id = $request->input('id');

       
        if(!$id){
        $model = new LampiranPendedahan;
        $model->flag = 1;
        $model->kod_kategori = 1;
        $model->delete_id = 0;
        $model->created_by = $nokp->nokp;
        $model->nokp = $nokp->nokp;
        $model->user_id = $user;
        $model->created_by = $nokp->nokp;
        $model->updated_by = $nokp->nokp;
         }else{
            $model = LampiranPendedahan::find($id);
        }
        
        $model->diskripsi = $tajuk;

        if($model->save()) {
            return response()->json([
                'success' => !$id ? 1 : 2,
                'data' => [
                    'tajuk' => $model->diskripsi,
                    'id' => $model->id
                ]
            ]);
        } else {
            return response()->json([
                'success' => 0,
                'data' => []
            ]);
        }
    }

    public function save_pencapaian(Request $request) {
        $nokp = Auth::user();
        $tajuk = $request->input('tajuk');
        $user = $request->input('user');
        $id = $request->input('id');

        if(!$id){
            $model = new LampiranPendedahan;
            $model->flag = 1;
            $model->kod_kategori = 2;
            $model->delete_id = 0;
            $model->created_by = $nokp->nokp;
            $model->nokp = $nokp->nokp;
            $model->user_id = $user;
            $model->created_by = $nokp->nokp;
            $model->updated_by = $nokp->nokp;
        }else{
            $model = LampiranPendedahan::find($id);
        }
        
        $model->diskripsi = $tajuk;

        if($model->save()) {
            return response()->json([
                'success' => !$id ? 1 : 2,
                'data' => [
                    'tajuk' => $model->diskripsi,
                    'id' => $model->id
                ]
            ]);
        } else {
            return response()->json([
                'success' => 0,
                'data' => []
            ]);
        }
    }


    public function delete_pendedahan(Request $request) {
        $LampiranPendedahanID =  $request->input('id');

        $model = LampiranPendedahan::find($LampiranPendedahanID);

        if($model->delete()) {
            return response()->json([
                'success' => 1,
                'data' => []
            ]);
        } else {
            return response()->json([
                'success' => 0,
                'data' => []
            ]);
        }
    }

     public function delete_pencapaian(Request $request) {
        $LampiranPendedahanID =  $request->input('id');

        $model = LampiranPendedahan::find($LampiranPendedahanID);

        if($model->delete()) {
            return response()->json([
                'success' => 1,
                'data' => []
            ]);
        } else {
            return response()->json([
                'success' => 0,
                'data' => []
            ]);
        }
    }

    public function delete_kursus(Request $request) {
        $LampiranKursusID =  $request->input('id');

        $model = LampiranKursus::find($LampiranKursusID);

        if($model->delete()) {
            return response()->json([
                'success' => 1,
                'data' => []
            ]);
        } else {
            return response()->json([
                'success' => 0,
                'data' => []
            ]);
        }
    }

     public function delete_projek(Request $request) {
        $LampiranProjekID =  $request->input('id');

        $model = LampiranProjek::find($LampiranProjekID);

        if($model->delete()) {
            return response()->json([
                'success' => 1,
                'data' => []
            ]);
        } else {
            return response()->json([
                'success' => 0,
                'data' => []
            ]);
        }
    }

     public function save_beban(Request $request) {
        $lampiran = $request->file('lampiran_beban');
        $model = new LampiranBebanKerja;
        if($lampiran){
            $upload = CommonController::upload_image($lampiran, 'documents');

            $model->path = '/documents/'.$upload;
            $model->nokp =  Auth::user()->nokp;
            $model->save();
        }

        return response()->json(["success"=>true,"uploaded"=>true, "url"=>$model->path]);
    }



     public function senarai(Request $request,$id) {
         $model = Role::all();
        return view('mockup4')->with('roles',$model);
    }


public function lampiran3($ic)
    {
    $lampiran_beban = LampiranBebanKerja::where('nokp',$ic)->orderBy('id','desc')->first();
      $pdf = Pdf::loadView('$lampiran_beban->path', compact('lampiran_beban'));
        return $pdf->stream("dompdf_out.pdf", array("Attachment" => false, 'enable_remote' => true));
        exit(0);
     }


     public function download()
     {
          $ic = Auth::user();

           $model= [];
        $mula_khidmat ='';

        $model=ListPegawai2::getMaklumatPegawai($ic->nokp);
        $mula_khidmat=Perkhidmatan::where('nokp',$ic->nokp)->where('kod_kumpulan',3)->orderBy('tkh_lantik', 'asc')->first();
        $gred_sekarang = Perkhidmatan::where('nokp',$ic->nokp)->where('kod_kumpulan',3)->orderBy('tkh_lantik', 'desc')->first();

        $mula_gred_hakiki=Perkhidmatan::where('nokp',$ic->nokp)->where('kod_kumpulan',3)->where('status_perkhidmatan','H')->orderBy('tkh_lantik', 'desc')->first();
        $modelp = Pengalaman::where('nokp', $ic->nokp)->where('kod_aktiviti','>=', [50])->groupBy('id_pengalaman','kod_aktiviti')->orderBy('kod_aktiviti')->get();

        // $mula_p = Pengalaman::where('nokp',$ic)->orderBy('tkh_mula','asc')->groupBy('kod_aktiviti','id_pengalaman')->first();
        // dd($mula_p);
        //SEKTOR AWAM
        $sektor_awam_mula = Perkhidmatan::where('nokp',$ic->nokp)->orderBy('tkh_lantik','asc')->first();
        $sektor_awam_tamat = Carbon::now();
        $date2 = new DateTime($sektor_awam_mula->tkh_lantik);
        $date1 = new DateTime($sektor_awam_tamat);
        $tempoh_awam = $date1->diff($date2);

         //PNP
        $pnp = Perkhidmatan::where('nokp',$ic->nokp)->where('kod_kumpulan','>=',3)->orderBy('tkh_lantik','asc')->first();
        $sektor_awam_tamat = Carbon::now();
        $date2 = new DateTime($pnp->tkh_lantik);
        $date1 = new DateTime($sektor_awam_tamat);
        $tempoh_pnp = $date1->diff($date2);
           // echo '<pre>';
           //  print_r($tempoh_awam);
           //  echo '</pre>';
           //  die();
        $pengalaman = DB::connection('pgsqlmykj')->table('public.pengalaman as p')
                                         ->leftJoin('public.l_aktiviti as la','p.kod_aktiviti','la.kod_aktiviti')->select('p.kod_aktiviti','la.aktiviti')
                                        ->where('p.nokp',$ic->nokp)
                                        ->where('p.kod_aktiviti','>=',23)
                                        ->orderBy('p.kod_aktiviti')
                                        ->groupBy('p.kod_aktiviti','la.aktiviti')
                                        ->distinct()
                                        ->get();
        $pengalaman_mula = DB::connection('pgsqlmykj')->table('public.pengalaman as p')
                                         ->select('p.kod_aktiviti','p.tkh_mula','p.tkh_tamat')
                                        ->where('p.nokp',$ic->nokp)
                                        ->where('p.kod_aktiviti','>=',23)
                                        ->orderBy('p.kod_aktiviti')
                                        ->groupBy('p.kod_aktiviti','p.tkh_mula','p.tkh_tamat')
                                        ->distinct()
                                        ->get();

        $lampiran_kursus = LampiranKursus::where('nokp',$ic->nokp)->get();
        $lampiran_beban = LampiranBebanKerja::where('nokp',$ic->nokp)->orderBy('id','desc')->first();
        $lampiran_projek = LampiranProjek::where('nokp',$ic->nokp)->get();
        $lampiran_kepakaran = LampiranPendedahan::where('nokp',$ic->nokp)->where('kod_kategori',1)->get();
        $lampiran_pencapaian = LampiranPendedahan::where('nokp',$ic->nokp)->where('kod_kategori',2)->get();
     

        // echo '<pre>';
        // print_r($model);
        // echo '</pre>';
        // die();        
         return view('admin.user.resume.cetak_sendiri', compact('model','mula_khidmat','mula_gred_hakiki','tempoh_awam','pengalaman','pengalaman_mula','lampiran_kursus','lampiran_beban','lampiran_projek', 'lampiran_kepakaran','lampiran_pencapaian','tempoh_pnp','modelp','gred_sekarang'));

     }

    public function document($ic)
    {
        $model= [];
        $mula_khidmat ='';

        $model=ListPegawai2::getMaklumatPegawai($ic);
        $mula_khidmat=Perkhidmatan::where('nokp',$ic)->where('kod_kumpulan',3)->orderBy('tkh_lantik', 'asc')->first();
        $gred_sekarang = Perkhidmatan::where('nokp',$ic)->where('kod_kumpulan',3)->orderBy('tkh_lantik', 'desc')->first();

        $mula_gred_hakiki=Perkhidmatan::where('nokp',$ic)->where('kod_kumpulan',3)->where('status_perkhidmatan','H')->orderBy('tkh_lantik', 'desc')->first();
        $modelp = Pengalaman::where('nokp', $ic)->where('kod_aktiviti','>=', [50])->groupBy('id_pengalaman','kod_aktiviti')->orderBy('kod_aktiviti')->get();

        // $mula_p = Pengalaman::where('nokp',$ic)->orderBy('tkh_mula','asc')->groupBy('kod_aktiviti','id_pengalaman')->first();
        // dd($mula_p);
        //SEKTOR AWAM
        $sektor_awam_mula = Perkhidmatan::where('nokp',$ic)->orderBy('tkh_lantik','asc')->first();
        $sektor_awam_tamat = Carbon::now();
        $date2 = new DateTime($sektor_awam_mula->tkh_lantik);
        $date1 = new DateTime($sektor_awam_tamat);
        $tempoh_awam = $date1->diff($date2);

         //PNP
        $pnp = Perkhidmatan::where('nokp',$ic)->where('kod_kumpulan','>=',3)->orderBy('tkh_lantik','asc')->first();
        $sektor_awam_tamat = Carbon::now();
        $date2 = new DateTime($pnp->tkh_lantik);
        $date1 = new DateTime($sektor_awam_tamat);
        $tempoh_pnp = $date1->diff($date2);
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
        $lampiran_beban = LampiranBebanKerja::where('nokp',$ic)->orderBy('id','desc')->first();
        $lampiran_projek = LampiranProjek::where('nokp',$ic)->get();
        $lampiran_kepakaran = LampiranPendedahan::where('nokp',$ic)->where('kod_kategori',1)->get();
        $lampiran_pencapaian = LampiranPendedahan::where('nokp',$ic)->where('kod_kategori',2)->get();





         return view('admin.user.resume.cetak', compact('model','mula_khidmat','mula_gred_hakiki','tempoh_awam','pengalaman','pengalaman_mula','lampiran_kursus','lampiran_beban','lampiran_projek', 'lampiran_kepakaran','lampiran_pencapaian','tempoh_pnp','modelp','gred_sekarang'));


    }





      public function email(Request $request,$ic) {
       //dd(1);
         $nokp = $request->input('nokp');
         $user = DB::connection('pgsql')->table('users as u')
             ->where('u.nokp',$ic)->first()? true : false;
         $pegawai=DB::connection('pgsqlmykj')->table('list_pegawai2 as np')
             ->select('np.nokp','np.nama','np.email','np.kod_gred','np.jawatan')
             ->where('np.nokp',$ic)->first();


             

     $dateline = Carbon::now();
     $daysToAdd = 5;
     $dateline = $dateline->addDays($daysToAdd);


        $content = [
                     'link' => url('user/resume/lampiran')


                ];
                Mail::mailer('smtp')->send('mail.lampiran-mail',$content,function($message) use ($pegawai) {
                    // testing purpose
                  $message->to('haryana@vn.net.my',$pegawai->nama);


                    $message->subject('KEMASKINI RESUME');

                });

         
        $model = new Resume;
        $model->flag = 1;
        $model->status = 1;
        $model->created_by = $pegawai->nokp;
        $model->nokp = $pegawai->nokp;
        $model->nama = $pegawai->nama;
        $model->kod_gred = $pegawai->kod_gred;
        $model->jawatan = $pegawai->jawatan;
        $model->created_by = $pegawai->nokp;
        $model->updated_by = $pegawai->nokp;
         $model->save();

        return response()->json([
            'success' => 1,
            'data' => [
                'nokp' => $nokp,]
        ]);
    }



    function semakcuti($tarikh)
    {
        $year = date("Y");
        $cuti= Holidays::model()->getCuti($year);
        $tkh_slabaru=$tarikh;
        $tkh= Yii::app()->dateFormatter->format("yyyy-MM-dd", strtotime($tarikh));
        if(date("N", strtotime($tarikh)) == 6 || date("N", strtotime($tarikh)) == 7) //weekend
        {
            $tkh_slabaru = Yii::app()->dateFormatter->format("yyyy-MM-dd HH:mm:ss", strtotime($tkh_slabaru . ' +1 day')) ;
            return($this->semakcuti($tkh_slabaru));

        }
        elseif (in_array ($tkh, $cuti)){
         $tkh_slabaru = Yii::app()->dateFormatter->format("yyyy-MM-dd HH:mm:ss", strtotime($tkh_slabaru . ' +1 day')) ;
         return($this->semakcuti($tkh_slabaru));
     }

     return $tkh_slabaru;

 }


 public function getPencapaian(Request $request){
    $model = LampiranPendedahan::find($request->input('id'));

    return response()->json([
        'success' => 1,
        'data' => [
            'result' => $model->diskripsi
        ]
    ]);
 }

  public function getPendedahan(Request $request){
    $model = LampiranPendedahan::find($request->input('id'));

    return response()->json([
        'success' => 1,
        'data' => [
            'result' => $model->diskripsi
        ]
    ]);
 }

  public function getKursus(Request $request){
    $model = LampiranKursus::find($request->input('id'));

    return response()->json([
        'success' => 1,
        'data' => [
            'nama' => $model->nama_kursus,
            'mula' => $model->tkh_mula,
            'tamat' => $model->tkh_tamat,
            'tempat' => $model->tempat
        ]
    ]);
 }


   public function getProjek(Request $request){
    $model = LampiranProjek::find($request->input('id'));

    return response()->json([
        'success' => 1,
        'data' => [
            'nama' => $model->nama_projek,
            'kos' => $model->kos_projek
        ]
    ]);
 }


}
