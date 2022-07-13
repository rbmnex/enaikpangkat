<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class UserMgmtController extends Controller
{
    //
    public function senarai_pengguna(Request $request) {
        $model = DB::conection('pgsql')->table('users as ur')
            ->leftJoin('peribadi as pr','pr.users_id', 'ur.id')
            ->leftJoin('penempatan as pp', 'pp.id_peribadi', 'pr.id')
            ->select('ur.name','pp.jawatan','pp.unit','pp.bahagian','pp.cawangan','pp.pejabat', 'ur.email','ur.id as user_id', 'pr.id as peribadi_id', 'pp.id as penempatan_id', 'ur.flag')
            ->where('ur.type', 1)
            ->get();

            return DataTables::of($model)
                ->setRowAttr([
                    'data-user-id' => function($data) {
                        return $data->user_id;
                    },
                    'data-peribadi-id' => function($data) {
                        return $data->peribadi_id;
                    },
                    'data-penempatan-id' => function($data) {
                        return $data->penempatan_id;
                    }
                ])
                ->addColumn('lokasi', function($data) {
                    return strtoupper($data->unit).", ".strtoupper($data->bahagian).", ".strtoupper($data->cawangan).", ".strtolower($data->pejabat);
                })
                ->rawColumns(['aktif','aksi'])
                ->make(true);
    }

}
