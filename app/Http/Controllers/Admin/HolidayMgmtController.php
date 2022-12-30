<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Urussetia\Holidays;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class HolidayMgmtController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {

    }

    public function list() {
        $model = Holidays::where('delete_id', 0)->get();

        return DataTables::of($model)
            ->setRowAttr([
                'data-holiday-id' => function($data) {
                    return $data->id;
                }
            ])
            ->addColumn('tkh_cuti',function($data) {
                return \Carbon\Carbon::parse($data->holiday_date)->format('d-M-Y');
            })
            ->rawColumns(['aksi'])
            ->make(true);

    }

    public function add(Request $request) {

    }
}
