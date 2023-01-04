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
        $model = Pemohon::with('pemohonPeribadi','pemohonPermohonan')->where('user_id',$user->id)->get();
        return DataTables::of($model)
            ->setRowAttr([
                'data-pemohon-id' => function($data) {
                    return $data->id;
                },
                'data-permohonan-id' => function($data) {
                    return $data->id_permohonan;
                },
                'data-pemohon-nokp' => function($data) {
                    return empty($data->pemohonPeribadi) ? '' : $data->pemohonPeribadi->nokp;
                },
                'data-jenis-penempatan' => function($data) {
                    return $data->jenis_penempatan;
                },
                'data-file-id' => function($data) {
                    return $data->form_file;
                }
            ])
            ->addColumn('jenis', function($data){
                return $data->pemohonPermohonan->jenis;
            })->addColumn('tarikh', function($data){
                return \Carbon\Carbon::parse($data->created_at)->format('d-m-Y');
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function downlaod_pink(Request $request,$id) {
        $record = SuratPink::where('id_pemohon',$id)->where('flag',1)->where('delete_id',0)->first();
        if(empty($record)) {
            return view('form.message',['message' => 'Tiada Lagi Surat Pink Dikeluarkan, Diharap Bersabar']);
        } else {
            if(empty($record->fail_id)) {
                return view('form.message',['message' => 'Tiada Lagi Surat Pink Dikeluarkan, Diharap Bersabar']);
            } else {
                return redirect(url('/').'/common/id-download?fileid='.$record->fail_id);
            }
        }

    }
}
