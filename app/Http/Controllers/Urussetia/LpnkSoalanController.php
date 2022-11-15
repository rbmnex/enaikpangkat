<?php

namespace App\Http\Controllers\Urussetia;

use App\Http\Controllers\Controller;
use App\Models\Lpnk\LpnkChild;
use App\Models\Lpnk\LpnkParent;
use App\Models\Permohonan\Pemohon;
use App\Models\Permohonan\PermohonanUkp12;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class LpnkSoalanController extends Controller
{
    public function index(){
        return view('segment.bpsm.index');
    }

    public function getList(Request $request) {
        $model = LpnkParent::where('delete_id', 0)->get();

        return DataTables::of($model)
            ->setRowAttr([
                'data-soalan-id' => function($data) {
                    return $data->id;
                },
            ])
            ->addColumn('nama', function($data){
                return $data->nama;
            })
            ->addColumn('action', function($data){
                return $data->nokp;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function soalan_post(Request $request){
        $name = $request->input('soalan_name');
        $soalan_id = $request->input('soalan_id');
        $trigger = $request->input('trigger');

        if($trigger == 0 ){
            $model = new LpnkParent;
        }else{
            $model = LpnkParent::find($soalan_id);
        }
        $model->nama = $name;
        $model->save();

        return response()->json([
            'success' => 1,
            'data' => [
                'trigger' => $trigger
            ]
        ]);
    }

    public function get_soalan(Request $request){
        $soalan_id = $request->input('soalan_id');
        $model = LpnkParent::find($soalan_id);

        $data = [];
        $data['nama'] = $model->nama;

        return response()->json([
            'success' => 1,
            'data' => $data
        ]);
    }

    public function getSubList($soalan_id){
        $model = LpnkChild::where('delete_id', 0)->where('lpnk_parents_id', $soalan_id)->get();

        return DataTables::of($model)
            ->setRowAttr([
                'data-soalan-id' => function($data) {
                    return $data->id;
                },
            ])
            ->addColumn('nama', function($data){
                return $data->nama;
            })
            ->addColumn('penerangan', function($data){
                return $data->penerangan;
            })
            ->addColumn('action', function($data){
                return $data->nokp;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function sub_soalan_post(Request $request){
        $name = $request->input('sub_soalan_name');
        $sub_soalan_name_penerangan = $request->input('sub_soalan_name_penerangan');
        $soalan_id = $request->input('sub_soalan_id');
        $trigger = $request->input('trigger');
        $parent_id = $request->input('parent_id');

        if($trigger == 0 ){
            $model = new LpnkChild;
        }else{
            $model = LpnkChild::find($soalan_id);
        }
        $model->nama = $name;
        $model->penerangan = $sub_soalan_name_penerangan;
        $model->lpnk_parents_id = $parent_id;
        $model->save();

        return response()->json([
            'success' => 1,
            'data' => [
                'trigger' => $trigger
            ]
        ]);
    }

    public function get_sub_soalan(Request $request){
        $soalan_id = $request->input('soalan_id');
        $model = LpnkChild::find($soalan_id);

        $data = [];
        $data['nama'] = $model->nama;
        $data['penerangan'] = $model->penerangan;

        return response()->json([
            'success' => 1,
            'data' => $data
        ]);
    }

    public function delete_soalan(Request $request){
        $id = $request->input('id');
        $model = LpnkParent::find($id);
        $model->delete_id = 1;
        $model->save();

        return response()->json([
            'success' => 1
        ]);
    }

    public function delete_sub_soalan(Request $request){
        $id = $request->input('id');
        $model = LpnkChild::find($id);
        $model->delete_id = 1;
        $model->save();

        return response()->json([
            'success' => 1
        ]);
    }
}

