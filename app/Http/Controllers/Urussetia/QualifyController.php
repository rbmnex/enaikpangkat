<?php

namespace App\Http\Controllers\Urussetia;

use App\Http\Controllers\Controller;
use App\Models\Permohonan\Pemohon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class QualifyController extends Controller
{
    //
    public function load_page(Request $request) {
        return view('urussetia.qualify.index');
    }

    public function load_list(Request $request) {
        $model = Pemohon::with('pemohonPeribadi','pemohonPermohonan')
                    ->where('status',Pemohon::SUCCESSED)
                    ->where('flag', 1)
                    ->where('delete_id',0)
                    ->get();
        return DataTables::of($model)
                ->setRowAttr([
                    'data-pemohon-id' => function($data) {
                        return $data->id;
                    },
                    'data-permohonan-id' => function($data) {
                        return $data->pemohonPermohonan->id;
                    },
                    'data-pemohon-nokp' => function($data) {
                        return $data->pemohonPeribadi->nokp;
                    },
                ])
                ->addColumn('nokp',function($data) {
                    return $data->pemohonPeribadi->nokp;
                })
                ->addColumn('position',function($data) {
                    return $data->jawatan.' '.$data->gred;
                })
                ->addColumn('nama',function($data) {
                    return $data->pemohonPeribadi->nama;
                })
                ->addColumn('kumpulan',function($data) {
                    return $data->pemohonPermohonan->title;
                })
                ->rawColumns(['aksi'])
                ->make(true);
    }

    public function proceed(Request $request) {
        $applicant_list = json_decode($request->input('applicant_list'));
        $records = Pemohon::whereIn('id',$applicant_list)->get();
        foreach($records as $pemohon) {
            $pemohon->status = Pemohon::WAITING_OFFER;
            $pemohon->save();
        }

        return response()->json([
            'success' => 1,
            'data' => []
        ]);
    }
}
