<?php
namespace App\Http\Controllers\Segment\Kb\PengesahanPink;

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

class PengesahanPinkController extends Controller{
    public function index(){
        return view('segment.kb.pengesahanpink.index');
    }

    public function getPinkFormList(){
        $data = PenerimaanUkp11::where('nokp_kerani', Auth::user()->nokp)->get();
//        {data: 'nokp'},
//        {data: 'nama'},
//        {data: 'jawatan'},
//        {data: 'jenis'},
//        {data: 'status'},
//        {data: 'aksi'},
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

    public function updateTawaran($id){
        $pemohon = Pemohon::with('pemohonPeribadi', 'pemohonPink', 'pemohonPermohonan')->where('id', $id)->first();
        return view('segment.pemangku.tawaran.tawaran_update', [
            'data' => $pemohon,
            'pemohon_id' => $id
        ]);
    }

    public function updateTawaranPost(Request $request){
        $tawaran_setuju = $request->input('tawaran_setuju');
        $tawaran_tkh_kuatkuasa_baru = $request->input('tawaran_tkh_kuatkuasa_baru');
        $tawaran_tkh_lapor_diri = $request->input('tawaran_tkh_lapor_diri');
        $tawaran_tkh_mula_tugas = $request->input('tawaran_tkh_mula_tugas');
        $tawaran_ketua_bahagian = $request->input('tawaran_ketua_bahagian');
        $tawaran_ketua_jabatan = $request->input('tawaran_ketua_jabatan');
        $pemohon_id = $request->input('pemohon_id');
        $tawaran_tkh_tangguh_start = $request->input('tawaran_tkh_tangguh_start');
        $tawaran_tkh_tangguh_end = $request->input('tawaran_tkh_tangguh_end');
        $tawaran_surat_tangguh =  $request->file('tawaran_surat_tangguh');

        $pemohon = Pemohon::find($pemohon_id);
        $pemohon->status = $tawaran_setuju;

        $ukp11 = PenerimaanUkp11::where('id_pemohon', $pemohon_id)->first();
        $ukp11->status_terima_pemangkuan = $tawaran_setuju == 'TL' ? 1 : 0;
        $ukp11->tkh_status_terima_pemangkuan = date('Y-m-d');
        $ukp11->tkh_kuatkuasa_pemangkuan_pinkform = $pemohon->pemohonPink->tkh_lapor_diri;
        $ukp11->tkh_lapor_diri = $tawaran_tkh_lapor_diri;
        $ukp11->tkh_kuatkuasa_pemangkuan = $tawaran_tkh_mula_tugas;
        $ukp11->id_surat_pink = $pemohon->pemohonPink->id;

        $kerani = ListPegawai2::getMaklumatPegawai($tawaran_ketua_bahagian);
        $ketuaJabatan = ListPegawai2::getMaklumatPegawai($tawaran_ketua_jabatan);

        $ukp11->nokp_kerani = $tawaran_ketua_bahagian;
        $ukp11->nama_kerani = $kerani['name'];
        $ukp11->jawatan = $kerani['jawatan'];
        $ukp11->cawangan = $kerani['waran_name']['cawangan'];

        $keraniUser = User::upsert($tawaran_ketua_bahagian);

        $ukp11->nokp_ketua_jabatan = $tawaran_ketua_jabatan;
        $ukp11->nama_ketua_jabatan = $ketuaJabatan['name'];
        $ukp11->jawatan_ketua_jabatan = $ketuaJabatan['jawatan'];
        $ukp11->cawangan_ketua_jabatan = $ketuaJabatan['waran_name']['cawangan'];

        $kbUser = User::upsert($tawaran_ketua_jabatan);
        DB::table('role_user')->insert([
            'role_id' => 5,
            'user_id' => $keraniUser->id,
            'user_type' => 'jkr',
        ]);

        DB::table('role_user')->insert([
            'role_id' => 6,
            'user_id' => $kbUser->id,
            'user_type' => 'jkr',
        ]);
        $ukp11->save();
        $pemohon->save();

//        if($tawaran_tkh_tangguh_start == '' && $tawaran_tkh_tangguh_end == ''){
//            if($tawaran_surat_tangguh){
//                $upload = CommonController::base64_upload($tawaran_surat_tangguh);
//                $file = new File;
//                $file->content_bytes = $upload['base64'];
//                $file->ext = $upload['ext'];
//                $file->filename = $ukp11->id.'.'.$upload['ext'];
//                $file->save();
//            }
//        }

        return response()->json([
            'success' => 1,
        ]);
    }

    public function semakPinkForm($pemohon_id){
        return view('segment.kb.pengesahanpink.semak', [
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
        $data->kerani_tkh = $setuju == 1 ? date('Y-m-d') : date('Y-m-d');
        $data->save();

        return redirect()->action(
            [PengesahanPinkController::class, 'index']
        );
    }

}
