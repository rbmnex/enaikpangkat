<?php

namespace App\Http\Controllers\Urussetia;

use App\Http\Controllers\Controller;
use App\Models\Urussetia\Calon;
use App\Models\Urussetia\Kumpulan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
            ->select('np.nokp','np.nama','np.kod_gred','np.jawatan','lj.jurusan','np.unit','np.bah','np.caw','np.tkh_sah_perkhidmatan')->limit(100)->get();

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
            ->select('np.nokp','np.nama','np.kod_gred','np.jawatan','lj.jurusan','np.unit','np.bah','np.caw','np.tkh_sah_perkhidmatan');

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
        } else {
            $model = Kumpulan::find($batch_id);
            $new = false;
        }
        $model->name = $nama;
        $model->flag = 1;
        $model->delete_id = 0;
        $model->created_by = Auth::user()->nokp;
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
                'data' => []
            ]);
        } else {
            return response()->json([
                'success' => 0,
                'data' => []
            ]);
        }

    }

    public function load_kumpulan(Request $request) {
        $batch_id = $request->input('batch_id');
        $model = Kumpulan::find($batch_id);

        return $request->json([
            'success' => 0,
            'data' => [
                'id' => $model->id,
                'name' => $model->name
            ]
        ]);
    }

    public function senarai_calon(Request $request) {
        $batch_id = $request->input('batch_id');

        $list_nokp = Calon::where('kumpulan_id', $batch_id)->pluck('nokp')->all();

        $model=DB::connection('pgsqlmykj')->table('list_pegawai_naikpangkat as np')
            ->leftJoin('l_jurusan as lj','np.kod_jurusan','lj.kod_jurusan')
            ->select('np.nokp','np.nama','np.kod_gred','np.jawatan','lj.jurusan','np.unit','np.bah','np.caw','np.tkh_sah_perkhidmatan')
            ->whereIn('np.nokp',$list_nokp)->get();

            return DataTables::of($model)
            ->setRowAttr([
                'data-calon-kp' => function($data) {
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
}
