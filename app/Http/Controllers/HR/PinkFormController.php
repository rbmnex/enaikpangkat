<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use App\Models\Permohonan\Pemohon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class PinkFormController extends Controller
{
    //

    public function index(Request $request) {
        return view('hr.pinkform.index');
    }

    public function load(Request $request) {
        $model = DB::connection('pgsql')->table('pemohon as p')
            ->join('peribadi as b','p.id_peribadi','b.id')
            ->join('permohonan_ukp12 as u','p.id_permohonan','u.id')
            ->select('p.id','b.nokp','b.nama','u.jawatan','u.gred','u.jenis','p.status')
            ->whereIn('p.status', array(Pemohon::SUCCESSED, Pemohon::WAITING_REPLY, Pemohon::ACCEPTED))
            ->where('p.flag',1)
            ->where('p.delete_id',0)
            ->get();

        return DataTables::of($model)
            ->setRowAttr([
                'data-pink-id' => function($data) {
                    return $data->id;
                },
                'data-person-nokp' => function($data) {
                    return $data->nokp;
                }
            ])->rawColumns(['aksi'])
            ->make(true);
    }
}
