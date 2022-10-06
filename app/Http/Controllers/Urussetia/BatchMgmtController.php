<?php

namespace App\Http\Controllers\Urussetia;

use App\Http\Controllers\Controller;
use App\Models\Mykj\LGred;
use App\Models\Mykj\LJawatan;
use App\Models\Mykj\LJurusan;
use App\Models\Permohonan\PermohonanUkp12;
use App\Models\Urussetia\Calon;
use App\Models\Urussetia\Kumpulan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\DataTables;

class BatchMgmtController extends Controller
{
    //
    public function index(Request $request){
        $query = DB::connection('pgsqlmykj')->select('select distinct extract(year from lpn.tkh_sah_perkhidmatan) as years
        from list_pegawai_naikpangkat lpn order by years asc');
        return view('urussetia.batch.batchmgmt')->with('years',$query);
    }

    public function senarai(Request $request) {
        $model = Kumpulan::where('flag', 1)->where('delete_id',0)->get();

        return DataTables::of($model)
            ->setRowAttr([
                'data-batch-id' => function($data) {
                    return $data->id;
                }
            ])->rawColumns(['aktif','aksi'])
            ->make(true);
    }

    public function senarai_pegawai(Request $request) {
        $model=DB::connection('pgsqlmykj')->table('list_pegawai_naikpangkat as np')
            ->leftJoin('l_jurusan as lj','np.kod_jurusan','lj.kod_jurusan')
            ->select('np.nokp','np.nama','np.kod_gred','np.jawatan','lj.jurusan','np.unit','np.bah','np.caw','np.tkh_sah_perkhidmatan','kod_kanan')->limit(100)->get();

        return DataTables::of($model)
            ->setRowAttr([
                'data-calon-kp' => function($data) {
                }
            ])
            ->addColumn('tempat',function($data) {
                $unit = empty($data->unit) ? '' : strtoupper($data->unit).', ';
                $bahagian = empty($data->bah) ? '' : strtoupper($data->bah).', ';
                $cawagan = empty($data->caw) ? '' : strtoupper($data->caw);
                return $unit.$bahagian.$cawagan;
            })
            ->make(true);
    }

    public function carian_pegawai(Request $request) {
        $tahun = $request->input('tahun');
        $jurusan = $request->input('jurusan');
        $gred = $request->input('gred');

        $model=DB::connection('pgsqlmykj')->table('list_pegawai_naikpangkat as np')
            ->leftJoin('l_jurusan as lj','np.kod_jurusan','lj.kod_jurusan')
            ->select('np.nokp','np.nama','np.kod_gred','np.jawatan','lj.jurusan','np.unit','np.bah','np.caw','np.tkh_sah_perkhidmatan','kod_kanan');

        if(!empty($tahun)) {
            $model = $model->where(DB::raw('extract(year from np.tkh_sah_perkhidmatan)'),$tahun);
        }
        if(!empty($jurusan)) {
            $model = $model->where('lj.kod_jurusan',$jurusan);
        }
        if(!empty($gred)) {
            $model = $model->where('np.kod_gred',$gred);
        }
        $model->get();

        return DataTables::of($model)
            ->setRowAttr([
                'data-calon-kp' => function($data) {
                }
            ])
            ->addColumn('tempat',function($data) {
                $unit = empty($data->unit) ? '' : strtoupper($data->unit).', ';
                $bahagian = empty($data->bah) ? '' : strtoupper($data->bah).', ';
                $cawagan = empty($data->caw) ? '' : strtoupper($data->caw);
                return $unit.$bahagian.$cawagan;
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
            $list_nokp = Calon::where('kumpulan_id', $batch_id)->where('flag', 1)->where('delete_id',0)->pluck('nokp')->all();

            $pegawais=DB::connection('pgsqlmykj')->table('list_pegawai_naikpangkat as np')
            ->select('np.nokp','np.nama','np.email')
            ->whereIn('np.nokp',$list_nokp)->get();

            foreach($pegawais as $calon) {
                $content = [
                    'link' => "http://mywebapp/form/ukp12/display/1?kp=".$calon->nokp
                ];
                Mail::mailer('smtp')->send('mail.ukp12-mail',$content,function($message) use ($calon) {
                    // testing purpose
                    $message->to('rubmin@vn.net.my',$calon->nama);

                    //$message->to($calon->email,$calon->nama);
                    $message->subject('URUSAN PEMANGKUAN DI JABATAN KERJA RAYA');

                });

            }

            $batch->updated_by = Auth::user()->nokp;
            $batch->status = "PROCESSED";
            $batch->permohonan_id = $model->id;
            $batch->save();
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

    public function senarai_calon(Request $request) {
        $batch_id = $request->input('batch_id');

        $list_nokp = Calon::where('kumpulan_id', $batch_id)->where('flag', 1)->where('delete_id',0)->pluck('nokp')->all();

        $model=DB::connection('pgsqlmykj')->table('list_pegawai_naikpangkat as np')
            ->leftJoin('l_jurusan as lj','np.kod_jurusan','lj.kod_jurusan')
            ->select('np.nokp','np.nama','np.kod_gred','np.jawatan','lj.jurusan','np.unit','np.bah','np.caw','np.tkh_sah_perkhidmatan','kod_kanan')
            ->whereIn('np.nokp',$list_nokp)->get();

            return DataTables::of($model)
            ->setRowAttr([
                'data-calon-id' => function($data) {
                    return $data->nokp;
                },
                'data-batch-id' => $batch_id,
            ])
            ->addColumn('tempat',function($data) {
                $unit = empty($data->unit) ? '' : strtoupper($data->unit).', ';
                $bahagian = empty($data->bah) ? '' : strtoupper($data->bah).', ';
                $cawagan = empty($data->caw) ? '' : strtoupper($data->caw);
                return $unit.$bahagian.$cawagan;
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
                'data' => []
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
        ->select('np.nokp','np.nama','np.kod_gred','np.jawatan','lj.jurusan','np.unit','np.bah','np.caw','np.tkh_sah_perkhidmatan')->where('np.nokp', 'ilike', '%'.$search_term.'%')
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

        $calon = $peribadi = DB::connection('pgsqlmykj')->table('list_pegawai_naikpangkat as np')
        ->leftJoin('l_jurusan as lj','np.kod_jurusan','lj.kod_jurusan')
        ->select('np.nokp','np.nama','np.kod_gred','np.jawatan','lj.jurusan','np.unit','np.bah','np.caw','np.tkh_sah_perkhidmatan')
        ->where('nokp', $nokp)->first();

        if($calon) {
            $unit = empty($calon->unit) ? '' : strtoupper($calon->unit).', ';
                $bahagian = empty($calon->bah) ? '' : strtoupper($calon->bah).', ';
                $cawagan = empty($calon->caw) ? '' : strtoupper($calon->caw);

            return response()->json([
                'success' => 1,
                'data' => [
                    'nama' => $calon->nama,
                    'nokp' => $calon->nokp,
                    'jawatan' => $calon->jawatan,
                    'gred' => $calon->kod_gred,
                    'tempat' => $unit.$bahagian.$cawagan,
                    'tkh_sah' => $calon->tkh_sah_perkhidmatan,
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
}
