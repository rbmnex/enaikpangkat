<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Permohonan\Pemohon;
use App\Models\Pink\SuratPink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class PermohonanController extends Controller
{
    //
    public function index(Request $request) {
        return view('user.index');
    }

    public function load_list(Request $request) {
        $user = Auth::user();
        $model = Pemohon::where('user_id',$user->id)->get();
        return DataTables::of($model)
            ->setRowAttr([
                'data-pemohon-id' => function($data) {
                    return $data->id;
                },
                'data-permohonan-id' => function($data) {
                    return $data->id_permohonan;
                },
                'data-pemohon-nokp' => function($data) {
                    return $data->pemohonPeribadi->nokp;
                }
            ])
            ->addColumn('jenis', function($data){
                return $data->pemohonPermohonan->jenis;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function downlaod_pink(Request $request,$id) {
        $record = SuratPink::where('id_pemohon',$id)->first();
        if(empty($record)) {
            return view('form.message',['message' => 'Tiada Lagi Surat Pink Dikeluarkan, Diharap Bersabar']);
        } else {
            if(empty($record->fail_id)) {
                return view('form.message',['message' => 'Tiada Lagi Surat Pink Dikeluarkan, Diharap Bersabar']);
            } else {
                redirect(url('/').'/common/id-download?fileid='.$record->fail_id);
            }
        }

    }
}
