<?php
namespace App\Http\Controllers\Segment\Kj\PengesahanBahagian;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Common\CommonController;
use App\Models\Mykj\ListPegawai2;
use App\Models\Permohonan\Pemohon;
use App\Models\Permohonan\PenerimaanUkp11;
use App\Models\Pink\SuratPink;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\File;
use Pdf;
use Illuminate\Support\Facades\Auth;

class PengesahanBahagianController extends Controller{
    public function index(){
        return view('segment.kj.pengesahanpink.index');
    }

    public function getPinkFormList(){
        $data = PenerimaanUkp11::where('nokp_ketua_jabatan', Auth::user()->nokp)->get();
        return DataTables::of($data)
            ->setRowAttr([
                'data-ukp11-id' => function($data) {
                    return $data->id;
                },
            ])
            ->addColumn('nokp', function($data){
                return $data->ukp11Pemohon->pemohonPeribadi->nokp;
            })
            ->addColumn('nama', function($data){
                return $data->ukp11Pemohon->pemohonPeribadi->nama;
            })
            ->addColumn('jawatan', function($data){
                return $data->ukp11Pemohon->jawatan;
            })
            ->addColumn('status', function($data){
                return $data->ukp11Pemohon->status;
            })
            ->addColumn('aksi', function($data){
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function semakPinkForm($pemohon_id){
        return view('segment.kj.pengesahanpink.semak', [
            'pemohon_id' => $pemohon_id
        ]);
    }

    public function preview_pdf($id){
        $data = Pemohon::find($id);

        $pdf = Pdf::loadView('segment.pemangku.tawaran.preview', compact('data'));
//        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream("preview_tawaran.pdf");
        exit(0);
    }

    public function setuju($setuju, $pemohon_id){
        $data = PenerimaanUkp11::where('id_pemohon', $pemohon_id)->first();
        $data->ketua_jabatan_tkh = $setuju == 1 ? date('Y-m-d') : date('Y-m-d');
        $data->perakuan_ketua_jabatan = 1;
        $data->save();

        return redirect()->action(
            [PengesahanBahagianController::class, 'index']
        );
    }

}
