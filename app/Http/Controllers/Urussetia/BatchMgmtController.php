<?php

namespace App\Http\Controllers\Urussetia;

use App\Http\Controllers\Common\CommonController;
use App\Http\Controllers\Controller;
use App\Models\Mykj\LJurusan;
use App\Models\Permohonan\Pemohon;
use App\Models\Permohonan\PermohonanUkp12;
use App\Models\Profail\Peribadi;
use App\Models\Urussetia\Calon;
use App\Models\Urussetia\Kumpulan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\DataTables;

class BatchMgmtController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request){
        $query = DB::connection('pgsqlmykj')->select('select distinct extract(year from lpn.tkh_sah_perkhidmatan) as years
        from list_pegawai_naikpangkat lpn order by years asc');
        return view('urussetia.batch.batchmgmt')->with('years',$query);
    }

    public function senarai(Request $request) {
        $model = Kumpulan::where('flag', 1)->where('delete_id',0)->orderBy('created_at','desc')->get();

        return DataTables::of($model)
            ->setRowAttr([
                'data-batch-id' => function($data) {
                    return $data->id;
                },
                'data-appl-id' => function($data) {
                    if(empty($data->permohonan)) {
                        return 0;
                    } else {
                        return $data->permohonan->id;
                    }
                }
            ])->rawColumns(['aktif','aksi'])
            ->make(true);
    }

    public function senarai_pegawai(Request $request) {
        // $model=DB::connection('pgsqlmykj')->table('list_pegawai_naikpangkat as np')
        //     ->leftJoin('l_jurusan as lj','np.kod_jurusan','lj.kod_jurusan')
        //     ->select('np.nokp','np.nama','np.kod_gred','np.jawatan','lj.jurusan','np.unit','np.bah','np.caw','np.tkh_sah_perkhidmatan','np.kod_kanan')
        //     ->orderBy('np.kod_kanan','asc')
        //     ->limit(100)->get();
        $model=DB::connection('pgsqlmykj')->table('list_pegawai_naikpangkat as np')
            ->leftJoin('l_jurusan as lj','np.kod_jurusan','lj.kod_jurusan')
            ->select('np.nokp','np.nama','np.kod_gred','np.jawatan','lj.jurusan','np.tkh_sah_perkhidmatan','np.kod_kanan', 'np.tkh_lantik', 'np.kod_kategori_penempatan')
            ->orderBy('np.kod_kanan','asc')
            ->limit(100)->get();

        return DataTables::of($model)
            ->setRowAttr([
                'data-calon-kp' => function($data) {
                }
            ])
            // ->addColumn('tempat',function($data) {
            //     $unit = empty($data->unit) ? '' : strtoupper($data->unit).', ';
            //     $bahagian = empty($data->bah) ? '' : strtoupper($data->bah).', ';
            //     $cawagan = empty($data->caw) ? '' : strtoupper($data->caw);
            //     return $unit.$bahagian.$cawagan;
            // })
            ->addColumn('tkh_lantikan',function($data) {
                if($data->kod_gred == 'J41')
                    return \Carbon\Carbon::parse($data->tkh_lantik)->format('d-m-Y');
                else {

                    return \Carbon\Carbon::parse($data->tkh_sah_perkhidmatan)->format('d-m-Y');
                }
            })
            ->make(true);
    }

    public function carian_pegawai(Request $request) {
        $tahun = $request->input('tahun');
        $jurusan = $request->input('jurusan');
        $gred = $request->input('gred');

        // $model=DB::connection('pgsqlmykj')->table('list_pegawai_naikpangkat as np')
        //     ->leftJoin('l_jurusan as lj','np.kod_jurusan','lj.kod_jurusan')
        //     ->select('np.nokp','np.nama','np.kod_gred','np.jawatan','lj.jurusan','np.unit','np.bah','np.caw','np.tkh_sah_perkhidmatan','np.kod_kanan');

        $model=DB::connection('pgsqlmykj')->table('list_pegawai_naikpangkat')
            ->leftJoin('l_jurusan','list_pegawai_naikpangkat.kod_jurusan','l_jurusan.kod_jurusan')
            ->select('list_pegawai_naikpangkat.nokp','list_pegawai_naikpangkat.nama','list_pegawai_naikpangkat.kod_gred','list_pegawai_naikpangkat.jawatan','l_jurusan.jurusan','list_pegawai_naikpangkat.tkh_sah_perkhidmatan','list_pegawai_naikpangkat.kod_kanan', 'list_pegawai_naikpangkat.tkh_lantik','list_pegawai_naikpangkat.kod_kategori_penempatan');

        if(!empty($tahun)) {
            $model = $model->where(DB::raw('extract(year from list_pegawai_naikpangkat.tkh_sah_perkhidmatan)'),$tahun);
        }
        if(!empty($jurusan)) {
            $model = $model->where('l_jurusan.kod_jurusan',$jurusan);
        }
        if(!empty($gred)) {
            $model = $model->where('list_pegawai_naikpangkat.kod_gred',$gred);
        }
        $model->orderBy('list_pegawai_naikpangkat.kod_kanan','asc')->get();

        return DataTables::of($model)
            ->setRowAttr([
                'data-calon-kp' => function($data) {
                }
            ])
            // ->addColumn('tempat',function($data) {
            //     $unit = empty($data->unit) ? '' : strtoupper($data->unit).', ';
            //     $bahagian = empty($data->bah) ? '' : strtoupper($data->bah).', ';
            //     $cawagan = empty($data->caw) ? '' : strtoupper($data->caw);
            //     return $unit.$bahagian.$cawagan;
            // })
            ->addColumn('tkh_lantikan',function($data) {
                if($data->kod_gred == 'J41')
                    return \Carbon\Carbon::parse($data->tkh_lantik)->format('d-m-Y');
                else {
                    return \Carbon\Carbon::parse($data->tkh_sah_perkhidmatan)->format('d-m-Y');
                }
            })
            ->make(true);
    }

    public function save_batch(Request $request) {
        $nama = $request->input('nama');

        $staff_list = json_decode($request->input('staff_list'));
        $batch_id = $request->input('batch_id');
        $model = new Kumpulan;
        $new = true;
        if(empty($batch_id)) {
            $model = new Kumpulan;
            $new = true;
            $model->created_by = Auth::user()->nokp;

            $jurusan = $request->input('jurusan');
            $gred = $request->input('gred');
            $tahun = $request->input('tahun');
            if(!empty($jurusan) || $jurusan != 'undefined') {
                $jurusanT = LJurusan::where('kod_jurusan',$jurusan)->first();
                if(!empty($jurusanT)) {
                    $model->kod_jurusan = $jurusanT->kod_jurusan;
                    $model->jurusan = $jurusanT->jurusan;
                }
            }
            if(!empty($gred) || $gred != 'undefine') {
                $model->gred = $gred;
            }
            if(!empty($tahun) || $tahun != 'undefine') {
                $model->tahun = $tahun;
            }
        } else {
            $model = Kumpulan::find($batch_id);
            $new = false;
        }
        $model->name = $nama;
        $model->flag = 1;
        $model->delete_id = 0;


        $model->updated_by = Auth::user()->nokp;
        $model->status = "NEW";

        if($model->save()) {
            $id_batch = $model->id;
            if($new) {
                foreach($staff_list as $nokp) {
                    $child = new Calon;
                    $child->kumpulan_id = $id_batch;
                    $child->nokp = $nokp;
                    $child->flag = 1;
                    $child->delete_id = 0;
                    $child->created_by = Auth::user()->nokp;
                    $child->updated_by = Auth::user()->nokp;
                    $child->save();
                }
            } else {
                // on hold - maybe not use
                // $insert = array();
                // foreach($staff_list as $nokp) {
                //     $insert[] = ['kumpulan_id' => $id_batch, 'nokp'=>$nokp];
                // }
                // DB::connection('pgsql')->table('calon')
                // ->upsert($insert,['kumpulan_id'],['nokp']);
            }

            return response()->json([
                'success' => 1,
                'data' => [
                    'flag' => $new
                ]
            ]);
        } else {
            return response()->json([
                'success' => 0,
                'data' => [
                    'flag' => $new
                ]
            ]);
        }

    }

    public function delete_batch(Request $request)
    {
        $batch_id = $request->input('batch_id');
        $model = Kumpulan::find($batch_id);
        $model->flag = 0;
        $model->delete_id = 1;
        $model->updated_by = Auth::user()->nokp;

        if($model->save()) {
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

    public function email_batch(Request $request) {
        //$kod_jawatan = $request->input('kod_jawatan');
        $kod_gred = $request->input('kod_gred');
        $kod_jurusan = $request->input('kod_jurusan');

        $batch_id = $request->input('batch_id');
        $batch = Kumpulan::find($batch_id);

        $model = new PermohonanUkp12;
        //$jawatan = LJawatan::where('kod_jawatan',$kod_jawatan)->first();
        $jurusan = LJurusan::where('kod_jurusan',$kod_jurusan)->first();

        $model->nokp_urusetia = Auth::user()->nokp;
        $model->jenis = 'UKP12';
        //$model->jawatan = $jawatan->jawatan;
        //$model->kod_jawatan = $kod_jawatan;
        $model->gred = $kod_gred;
        $model->kod_disiplin = $kod_jurusan;
        $model->disiplin = $jurusan->jurusan;
        $model->flag = 1;
        $model->delete_id = 0;
        $model->tajuk = $batch->name;

        if($model->save()) {
            $batch->updated_by = Auth::user()->nokp;
            $batch->status = "PROCESSED";
            $batch->permohonan_id = $model->id;
            $batch->save();

            $list_nokp = Calon::where('kumpulan_id', $batch_id)->where('flag', 1)->where('delete_id',0)->pluck('nokp')->all();

            foreach($list_nokp as $kp) {

                User::upsert($kp);
                $user = User::where('nokp',$kp)->first();
                if(!$user->hasRole('user')) {
                    $user->attachRole('user');
                }
                $profile = Peribadi::where('users_id',$user->id)->where('flag',1)->where('delete_id',0)->first();

                if(empty($profile)) {
                    $profile = $profile = Peribadi::recreate($user->id,$kp);
                }
                $pemohon = new Pemohon();
                $pemohon->flag = 1;
                $pemohon->delete_id = 0;
                $pemohon->id_permohonan = $model->id;
                $pemohon->id_peribadi = $profile->id;
                $pemohon->created_by = Auth::user()->nokp;
                $pemohon->updated_by = $kp;
                $pemohon->status = 'NA';
                $pemohon->user_id = $user->id;
                $pemohon->save();
            }

            $pegawais=DB::connection('pgsqlmykj')->table('list_pegawai_naikpangkat as np')
            ->select('np.nokp','np.nama','np.email','np.jawatan','np.kod_gred')
            ->whereIn('np.nokp',$list_nokp)->get();

            $common = new CommonController();

            foreach($pegawais as $calon) {
                $secure_link = Crypt::encryptString($model->id.'?kp='.$calon->nokp);

                $content = [
                    //'link' => "http://mywebapp/form/ukp12/display/1?kp=".$calon->nokp
                    'link' => url('/')."/form/ukp12/apply/".$secure_link,
                    'gred' => $kod_gred,
                    'end_date' => $common->translateMonth(Carbon::now()->addDays(14)->format('d M Y'))
                ];
                try {
                    Mail::mailer('smtp')->send('mail.ukp12-mail',$content,function($message) use ($calon,$kod_gred) {
                        // testing purpose
                        //$message->to('munirahj@jkr.gov.my',$calon->nama);
                        $message->to('rubmin@vn.net.my',$calon->nama);

                        //$message->to($calon->email,$calon->nama);
                        $message->subject('URUSAN PEMANGKUAN '.$calon->jawatan.' GRED '.$calon->kod_gred.' KE GRED '.$kod_gred.' DI JABATAN KERJA RAYA MALAYSIA');

                    });
                    Calon::where('kumpulan_id', $batch_id)->where('nokp', $calon->nokp)
                        ->update(['status' => 'SUCCESSED']);
                } catch(\Exception $e) {
                    Calon::where('kumpulan_id', $batch_id)->where('nokp', $calon->nokp)
                        ->update(['status' => 'FAILED']);
                }

            }

        }

        return response()->json([
            'success' => 1,
            'data' => []
        ]);
    }

    public function load_kumpulan(Request $request) {
        $batch_id = $request->input('batch_id');
        $model = Kumpulan::find($batch_id);

        return response()->json([
            'success' => 1,
            'data' => [
                'id' => $model->id,
                'name' => $model->name
            ]
        ]);
    }

    public function senarai_calon_status(Request $request) {
        $batch_id = $request->input('batch_id');
        $calons = Calon::where('kumpulan_id', $batch_id)->where('flag', 1)->where('delete_id',0)->get();
        $list_nokp = $calons->pluck('nokp')->all();

        $model=DB::connection('pgsqlmykj')->table('list_pegawai_naikpangkat as np')
            ->leftJoin('l_jurusan as lj','np.kod_jurusan','lj.kod_jurusan')
            ->select('np.nokp','np.nama','np.kod_gred','np.jawatan','lj.jurusan','np.tkh_sah_perkhidmatan','np.kod_kanan','np.tkh_lantik','np.kod_kategori_penempatan')
            ->whereIn('np.nokp',$list_nokp)
            ->orderBy('np.kod_kanan','asc')
            ->get();

        $model->each(function ($item, $key) use($calons) {
            $status = 'UNKNOW';
            foreach($calons as $c) {
                if($c->nokp == $item->nokp) {
                    $status = empty($c->status) ? 'UNKNOWN' : $c->status;
                    break;
                }
            }
            $item->status = $status;
        });
            return DataTables::of($model)
            ->setRowAttr([
                'data-calon-id' => function($data) {
                    return $data->nokp;
                },
                'data-batch-id' => $batch_id,
            ])
            // ->addColumn('tempat',function($data) {
            //     $unit = empty($data->unit) ? '' : strtoupper($data->unit).', ';
            //     $bahagian = empty($data->bah) ? '' : strtoupper($data->bah).', ';
            //     $cawagan = empty($data->caw) ? '' : strtoupper($data->caw);
            //     return $unit.$bahagian.$cawagan;
            // })
            ->addColumn('tkh_lantikan',function($data) {
                if($data->kod_gred == 'J41')
                    return \Carbon\Carbon::parse($data->tkh_sah_perkhidmatan)->format('d-m-Y');
                else {
                    return \Carbon\Carbon::parse($data->tkh_lantik)->format('d-m-Y');
                }
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function senarai_calon(Request $request) {
        $batch_id = $request->input('batch_id');
        $calons = Calon::where('kumpulan_id', $batch_id)->where('flag', 1)->where('delete_id',0)->get();
        $list_nokp = $calons->pluck('nokp')->all();

        // $model=DB::connection('pgsqlmykj')->table('list_pegawai_naikpangkat as np')
        //     ->leftJoin('l_jurusan as lj','np.kod_jurusan','lj.kod_jurusan')
        //     ->select('np.nokp','np.nama','np.kod_gred','np.jawatan','lj.jurusan','np.unit','np.bah','np.caw','np.tkh_sah_perkhidmatan','np.kod_kanan')
        //     ->whereIn('np.nokp',$list_nokp)
        //     ->orderBy('np.kod_kanan','asc')
        //     ->get();

        $model=DB::connection('pgsqlmykj')->table('list_pegawai_naikpangkat as np')
            ->leftJoin('l_jurusan as lj','np.kod_jurusan','lj.kod_jurusan')
            ->select('np.nokp','np.nama','np.kod_gred','np.jawatan','lj.jurusan','np.tkh_sah_perkhidmatan','np.kod_kanan','np.tkh_lantik')
            ->whereIn('np.nokp',$list_nokp)
            ->orderBy('np.kod_kanan','asc')
            ->get();

            return DataTables::of($model)
            ->setRowAttr([
                'data-calon-id' => function($data) {
                    return $data->nokp;
                },
                'data-batch-id' => $batch_id,
            ])
            // ->addColumn('tempat',function($data) {
            //     $unit = empty($data->unit) ? '' : strtoupper($data->unit).', ';
            //     $bahagian = empty($data->bah) ? '' : strtoupper($data->bah).', ';
            //     $cawagan = empty($data->caw) ? '' : strtoupper($data->caw);
            //     return $unit.$bahagian.$cawagan;
            // })
            ->addColumn('tkh_lantikan',function($data) {
                if($data->kod_gred == 'J41')
                    return \Carbon\Carbon::parse($data->tkh_sah_perkhidmatan)->format('d-m-Y');
                else {
                    return \Carbon\Carbon::parse($data->tkh_lantik)->format('d-m-Y');
                }
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function hapus_calon(Request $request) {
        $batch_id = $request->input('batch_id');
        $nokp = $request->input('nokp');

        $model = Calon::where('kumpulan_id',$batch_id)->where('nokp',$nokp)->first();

        $model->flag = 0;
        $model->delete_id = 1;
        $model->updated_by = Auth::user()->nokp;

        if($model->save()) {
            return response()->json([
                'success' => 1,
                'data' => []
            ]);
        } else {
            return response()->json([
                'success' => 0,
                'data' => [

                ]
            ]);
        }

    }

    public function tambah_calon(Request $request) {
        $batch_id = $request->input('batch_id');
        $nokp = $request->input('nokp');

        $model = Calon::where('kumpulan_id',$batch_id)->where('nokp',$nokp)->first();

        if($model) {
            $model->flag = 1;
            $model->delete_id = 0;
            $model->updated_by = Auth::user()->nokp;

        } else {
            $model = new Calon;
            $model->kumpulan_id = $batch_id;
                    $model->nokp = $nokp;
                    $model->flag = 1;
                    $model->delete_id = 0;
                    $model->created_by = Auth::user()->nokp;
                    $model->updated_by = Auth::user()->nokp;

        }

        if($model->save()) {
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

    public function carian_calon(Request $request){
        $data = [];
        $search_term = $request->input('q');
        $peribadi = DB::connection('pgsqlmykj')->table('list_pegawai_naikpangkat as np')
        ->leftJoin('l_jurusan as lj','np.kod_jurusan','lj.kod_jurusan')
        ->select('np.nokp','np.nama','np.kod_gred','np.jawatan','lj.jurusan','np.tkh_sah_perkhidmatan')->where('np.nokp', 'ilike', '%'.$search_term.'%')
            ->orWhereRaw("LOWER(np.nama) ilike '%".$search_term."%'")->limit(20)->get();

        if(count($peribadi) != 0){
            foreach($peribadi as $p){
                $data[] = array(
                    'id' => $p->nokp,
                    'text' => $p->nama.' - '.$p->nokp.' - '.$p->jawatan.' - '.$p->kod_gred.' - '.$p->jurusan
                );
            }
        }

        return response()->json([
            'data' => $data
        ]);
    }

    public function info_calon(Request $request) {
        $nokp = $request->input('nokp');

        // $calon = DB::connection('pgsqlmykj')->table('list_pegawai_naikpangkat as np')
        // ->leftJoin('l_jurusan as lj','np.kod_jurusan','lj.kod_jurusan')
        // ->select('np.nokp','np.nama','np.kod_gred','np.jawatan','lj.jurusan','np.unit','np.bah','np.caw','np.tkh_sah_perkhidmatan','no_kanan')
        // ->where('nokp', $nokp)->first();

        $calon = DB::connection('pgsqlmykj')->table('list_pegawai_naikpangkat as np')
        ->leftJoin('l_jurusan as lj','np.kod_jurusan','lj.kod_jurusan')
        ->select('np.nokp','np.nama','np.kod_gred','np.jawatan','lj.jurusan','np.tkh_sah_perkhidmatan','np.kod_kanan','np.tkh_lantik')
        ->where('nokp', $nokp)->first();

        if($calon) {
            // $unit = empty($calon->unit) ? '' : strtoupper($calon->unit).', ';
            //     $bahagian = empty($calon->bah) ? '' : strtoupper($calon->bah).', ';
            //     $cawagan = empty($calon->caw) ? '' : strtoupper($calon->caw);
            $tkh_sah = '';
            if($calon->kod_gred == 'J41')
                    $tkh_sah =  \Carbon\Carbon::parse($calon->tkh_sah_perkhidmatan)->format('d-m-Y');
                else {
                    $tkh_sah =  \Carbon\Carbon::parse($calon->tkh_lantik)->format('d-m-Y');
                }

            return response()->json([
                'success' => 1,
                'data' => [
                    'nama' => $calon->nama,
                    'nokp' => $calon->nokp,
                    'jawatan' => $calon->jawatan,
                    'gred' => $calon->kod_gred,
                    //'tempat' => $unit.$bahagian.$cawagan,
                    'tkh_sah' =>  $tkh_sah,
                    'jurusan' => $calon->jurusan
                ]
            ]);
        } else {
            return response()->json([
                'success' => 0,
                'data' => [

                ]
            ]);
        }
    }

    public function resend_email(Request $request) {
        $batch_id = $request->input('batch_id');
        $nokp = $request->input('nokp');

        $kumpulan = Kumpulan::find($batch_id);
        $model = Calon::where('kumpulan_id',$batch_id)->where('nokp',$nokp)->first();
        $pegawai=DB::connection('pgsqlmykj')->table('list_pegawai_naikpangkat as np')
            ->select('np.nokp','np.nama','np.email','np.jawatan','np.kod_gred')
            ->where('np.nokp',$nokp)->get();
        $kod_gred = $kumpulan->permohonan->gred;
        $common = new CommonController();
            $secure_link = Crypt::encryptString($kumpulan->permohonan->id.'?kp='.$nokp);
            $content = [
                //'link' => "http://mywebapp/form/ukp12/display/1?kp=".$calon->nokp
                'link' => url('/')."/form/ukp12/apply/".$secure_link,
                'gred' => $kumpulan->permohonan->gred,
                'end_date' => $common->translateMonth(Carbon::now()->addDays(14)->format('d M Y'))
            ];

            try {
                Mail::mailer('smtp')->send('mail.ukp12-mail',$content,function($message) use ($pegawai,$kod_gred) {
                    // testing purpose
                    //$message->to('munirahj@jkr.gov.my',$pegawai[0]->nama);
                    //$message->to('munirahj@jkr.gov.my',$calon->nama);

                    $message->to($pegawai->email,$pegawai[0]->nama);
                    $message->subject('URUSAN PEMANGKUAN '.$pegawai[0]->jawatan.' '.$pegawai[0]->kod_gred.' KE GRED '.$kod_gred.' DI JABATAN KERJA RAYA MALAYSIA');

                });
                $model->status = 'SUCCESSED';
                $model->save();

                return response()->json([
                    'success' => 1,
                    'data' => [
                        'message' => 'Success'
                    ]
                ]);
            } catch(\Exception $e) {
                $model->status = 'FAILED';
                $model->save();

                return response()->json([
                    'success' => 0,
                    'data' => [
                        'message' => $e->getMessage()
                    ]
                ]);
            }
    }
}
