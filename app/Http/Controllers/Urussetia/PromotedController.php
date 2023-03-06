<?php

namespace App\Http\Controllers\Urussetia;

use App\Http\Controllers\Controller;
use App\Models\Permohonan\Pemohon;
use App\Models\Permohonan\PermohonanUkp12;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class PromotedController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        return view('urussetia.promote.index');
    }

    public function list() {
        $model = DB::table('pemohon')
                    ->join('permohonan_ukp12','pemohon.id_permohonan','permohonan_ukp12.id')
                    ->join('peribadi','pemohon.id_peribadi','peribadi.id')
                    ->where('permohonan_ukp12.jenis','UKP13')
                    ->where('pemohon.flag',1)
                    ->where('pemohon.delete_id',0)
                    ->select('peribadi.nokp','peribadi.nama','pemohon.jawatan','pemohon.gred','pemohon.status', DB::raw('pemohon.id as pemohon_id'), DB::raw('permohonan_ukp12.id as permohonan_id'))
                    ->get();

        return DataTables::of($model)
                ->setRowAttr([
                    'data-pemohon-id' => function($data) {
                        return $data->pemohon_id;
                    },
                    'data-permohonan-id' => function($data) {
                        return $data->permohonan_id;
                    }
                ])
                ->addColumn('position', function($entry) {
                    return $entry->jawatan.' '.$entry->gred;
                })
                ->rawColumns(['aksi'])
                ->make(true);
    }
}
