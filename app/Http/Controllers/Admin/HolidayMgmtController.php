<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Urussetia\Holidays;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class HolidayMgmtController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('admin.holiday.index');
    }

    public function list() {
        $model = Holidays::where('delete_id', 0)->orderBy('holiday_date','desc')->get();

        return DataTables::of($model)
            ->setRowAttr([
                'data-holiday-id' => function($data) {
                    return $data->id;
                }
            ])
            ->addColumn('status',function($data) {
                return $data->flag == 1 ? 'Aktif' : 'Tidak Aktif';
            })
            ->addColumn('tkh_cuti',function($data) {
                return Carbon::parse($data->holiday_date)->format('d-m-Y');
            })
            ->rawColumns(['aksi'])
            ->make(true);

    }

    public function save(Request $request) {
        $id = $request->input('id');
        $name = $request->input('nama');
        $date = $request->input('tarikh');
        $desc = $request->input('penerangan');
        $dur = $request->input('tempoh');

        $model = NULL;

        if($id == 0) {
            $model = new Holidays();
            $model->created_by = Auth::user()->nokp;
        } else {
            $model = Holidays::find($id);
            if($model->ref != 0) {
                $model = Holidays::find($model->ref);
                Holidays::where('ref',$model->ref)->delete();
            }
        }

        $date_holiday =  Carbon::createFromFormat('d-m-Y', $date);

        $model->holiday_name = $name;
        $model->description = $desc;
        $model->length = $dur;
        $model->holiday_date = $date_holiday->format('Y-m-d');
        $model->updated_by = Auth::user()->nokp;
        $model->flag = 1;
        $model->delete_id = 0;
        $model->ref = 0;

        if($model->save()) {
            if($dur > 1) {
                $length = $dur - 1;
                for ($i=0; $i < $length; $i++) {
                    $child = new Holidays();
                    $child->created_by = Auth::user()->nokp;
                    $child->holiday_name = $name;
                    $child->description = $desc;
                    $child->length = $dur;
                    $child->holiday_date = $date_holiday->addDay()->format('Y-m-d');
                    $child->updated_by = Auth::user()->nokp;
                    $child->flag = 1;
                    $child->delete_id = 0;
                    $child->ref = $model->id;

                    $child->save();
                }
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

    public function load(Request $request) {
        $id = $request->input('id');
        $record = Holidays::find($id);
        if($record) {
            return response()->json([
                'success' => 1,
                'data' => [
                    'nama' => $record->holiday_name,
                    'penerangan' => $record->description,
                    'tempoh' => $record->length,
                    'tarikh' => Carbon::parse($record->holiday_date)->format('d-m-Y'),
                    'id' => $record->id,
                ]
            ]);
        } else {
            return response()->json([
                'success' => 0,
                'data' => []
            ]);
        }
    }

    public function toggleActive(Request $request) {
        $id = $request->input('id');
        $record = Holidays::find($id);
        if($record) {
            if($record->ref == 0) {
                $record->updated_by = Auth::user()->nokp;
                if($record->flag) {
                    $record->flag = 0;
                } else {
                    $record->flag = 1;
                }
                if($record->save()) {
                    return response()->json([
                        'success' => 1,
                        'data' => [
                            'flag' => $record->flag
                        ]
                    ]);
                } else {
                    return response()->json([
                        'success' => 0,
                        'data' => [
                            'error' => 'Error on level 1 - 1'
                        ]
                    ]);
                }
            } else {
                $parent = Holidays::find($record->ref);
                if($parent) {
                    $parent->updated_by = Auth::user()->nokp;
                    if($parent->flag) {
                        $parent->flag = 0;
                    } else {
                        $parent->flag = 1;
                    }
                    if($parent->save()) {
                        $childs = Holidays::where('ref',$parent->id)->get();
                        foreach ($childs as $h) {
                            if($h->flag) {
                                $h->flag = 0;
                            } else {
                                $h->flag = 1;
                            }
                            $h->updated_by = Auth::user()->nokp;
                            $h->save();
                        }
                        return response()->json([
                            'success' => 1,
                            'data' => [
                                'flag' => $parent->flag
                            ]
                        ]);
                    } else {
                        return response()->json([
                            'success' => 0,
                            'data' => [
                                'error' => 'Error on level 2 - 1'
                            ]
                        ]);
                    }
                } else {
                    return response()->json([
                        'success' => 0,
                        'data' => [
                            'error' => 'Error on level 2 - 2'
                        ]
                    ]);
                }

            }

        } else {
            return response()->json([
                'success' => 0,
                'data' => [
                    'error' => 'Error on level 1 - 2'
                ]
            ]);
        }
    }

    public function flag_delete(Request $request) {
        $id = $request->input('id');
        $record = Holidays::find($id);
        if($record) {
            if($record->ref == 0) {
                $record->updated_by = Auth::user()->nokp;
                $record->flag = 0;
                $record->delete_id = 1;

                if($record->save()) {
                    return response()->json([
                        'success' => 1,
                        'data' => [
                            'flag' => $record->flag
                        ]
                    ]);
                } else {
                    return response()->json([
                        'success' => 0,
                        'data' => [
                            'error' => 'Error on level 1 - 1'
                        ]
                    ]);
                }
            } else {
                $parent = Holidays::find($record->ref);
                if($parent) {
                    $parent->updated_by = Auth::user()->nokp;
                    $parent->flag = 0;
                    $parent->delete_id = 1;

                    if($parent->save()) {
                        $childs = Holidays::where('ref',$parent->id)->get();
                        foreach ($childs as $h) {
                            $h->flag = 0;
                            $h->delete_id = 1;

                            $h->updated_by = Auth::user()->nokp;
                            $h->save();
                        }
                        return response()->json([
                            'success' => 1,
                            'data' => [
                                'flag' => $parent->flag
                            ]
                        ]);
                    } else {
                        return response()->json([
                            'success' => 0,
                            'data' => [
                                'error' => 'Error on level 2 - 1'
                            ]
                        ]);
                    }
                } else {
                    return response()->json([
                        'success' => 0,
                        'data' => [
                            'error' => 'Error on level 2 - 2'
                        ]
                    ]);
                }

            }

        } else {
            return response()->json([
                'success' => 0,
                'data' => [
                    'error' => 'Error on level 1 - 2'
                ]
            ]);
        }
    }
}
