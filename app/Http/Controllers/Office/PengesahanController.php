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
    public function index(Request $request) {
        return view('office.pengesahan');
    }

    public function applicant_list(Request $request) {
        $user = Auth::user();
        $column = '';
        $role = 'user';
        if($user->hasRole('clerk')) {
            $column = 'pengesahan_perkhidmatan_nokp';
            $role = 'clerk';
        } else if($user->hasRole('hod')) {
            $column = 'nokp_ketua_jabatan';
            $role = 'hod';
        }
        $model = Pemohon::where($column,$user->nokp)->where('status',Pemohon::WAITING_VERIFICATION)->get();

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
