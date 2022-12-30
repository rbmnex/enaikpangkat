<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use App\Models\Permohonan\Pemohon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class PengesahanController extends Controller
{
    //
    public function index_hod(Request $request) {
        return view('office.pengesahan_hod');
    }

    public function index_hos(Request $request) {
        return view('office.pengesahan_hos');
    }

    public function applicant_list_hod(Request $request) {
        $user = Auth::user();
        $column = '';
        $role = 'user';

            $column = 'nokp_ketua_jabatan';
            $role = 'hod';


        // print_r($column.' : '.$role);

        // die();
        $model = Pemohon::where($column,$user->nokp)
            ->whereNotIn('status',['NA',Pemohon::NOT_SUBMITTED])
            ->where('pengesahan_perkhidmatan',1)
            ->get();

        return DataTables::of($model)
            ->setRowAttr([
                'data-calon-nokp' => function($data) {
                    return $data->pemohonPeribadi->nokp;
                },
                'data-pemohon-id' => function($data) {
                    return $data->id;
                },
                'data-role-name' => function($data) use($role) {
                    return $role;
                }
            ])
            ->addColumn('nama',function($data) {
                    return $data->pemohonPeribadi->nama;
            })
            ->addColumn('nokp',function($data) {
                return $data->pemohonPeribadi->nokp;
            })
            ->addColumn('jenis',function($data) {
                return $data->pemohonPermohonan->jenis;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function applicant_list_hos(Request $request) {
        $user = Auth::user();
            $column = 'pengesahan_perkhidmatan_nokp';
            $role = 'clerk';
        // print_r($column.' : '.$role);

        // die();
        $model = Pemohon::where($column,$user->nokp)
            ->whereNotIn('status',['NA',Pemohon::NOT_SUBMITTED])
            ->get();

        return DataTables::of($model)
            ->setRowAttr([
                'data-calon-nokp' => function($data) {
                    return $data->pemohonPeribadi->nokp;
                },
                'data-pemohon-id' => function($data) {
                    return $data->id;
                },
                'data-role-name' => function($data) use($role) {
                    return $role;
                }
            ])
            ->addColumn('nama',function($data) {
                    return $data->pemohonPeribadi->nama;
            })
            ->addColumn('nokp',function($data) {
                return $data->pemohonPeribadi->nokp;
            })
            ->addColumn('jenis',function($data) {
                return $data->pemohonPermohonan->jenis;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }
}
