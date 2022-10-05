<?php

namespace App\Http\Controllers\Urussetia;

use App\Http\Controllers\Controller;
use App\Models\Urussetia\Kumpulan;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BatchMgmtController extends Controller
{
    //
    public function index(Request $request){
        return view('urussetia.batch.batchmgmt');
    }

    public function senarai(Request $request) {
        $model = Kumpulan::where('flag', 1)->where('delete_id',0)->get();

        return DataTables::of($model)
            ->setRowAttr([
                'data-user-id' => function($data) {
                    return $data->id;
                }
            ])->rawColumns(['aktif','aksi'])
            ->make(true);
    }
}
