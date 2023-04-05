
<?php

namespace App\Http\Controllers\Segment\Penyelia;

use App\Http\Controllers\Common\CommonController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Form\UkpController;
use App\Models\File;
use App\Models\Lpnk\JawapanLpnk;
use App\Models\Lpnk\Lnpk;
use App\Models\Lpnk\LpnkParent;
use App\Models\Lpnk\SasaranKerja;
use App\Models\Mykj\ListPegawai2;
use App\Models\Permohonan\Pemohon;
use App\Models\Permohonan\PenerimaanUkp11;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class BoranglpnkController extends Controller
{
    public function index(){
        return view('segment.penyelia.lpnk.index');
    }

    public function getList(Request $request) {
        $model = Pemohon::where('nokp_penyelia', Auth::user()->nokp)->get();

        return DataTables::of($model)
            ->setRowAttr([
                'data-soalan-id' => function($data) {
                    return $data->id;
                },
            ])
            ->addColumn('nama', function($data){
                return $data->pemohonPeribadi->nama;
            })
            ->addColumn('nokp', function($data){
                return $data->pemohonPeribadi->nokp;
            })
            ->addColumn('jawatan', function($data){
                return $data->jawatan;
            })
            ->addColumn('gred', function($data){
                return $data->gred;
            })
            ->addColumn('status', function($data){
                return $data->lpnk_status == 0 ? 'BELUM DIJAWAB' : 'TELAH DIJAWAB';
            })
            ->addColumn('action', function($data){
                return $data->nokp;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function borang($pemohon_id){
        $ukpC = new UkpController();
        $p = Pemohon::find($pemohon_id);
        $ukp11 = PenerimaanUkp11::where('id_pemohon', $p->id)->first();
        $lnpk = Lnpk::where('id_pemohon',$pemohon_id)->first();
        $file = File::find($lnpk->fail_skt);
        $data = [];

        if($p){
            $data['user'] = $ukpC->load_info($p->pemohonPeribadi ,$p->pemohonPeribadi->nokp, $p);
            unset($data['user']['cuti']);
            unset($data['user']['pengalaman']);
            unset($data['user']['akademik']);
            unset($data['user']['profesional']);
            unset($data['user']['kompeten']);
            unset($data['user']['pengiktirafan']);
            unset($data['user']['pertubuhan']);
            unset($data['user']['loan']);
            unset($data['user']['sumbangan']);
        }

        $data['penyelia'] = $pl = ListPegawai2::getMaklumatPegawaiRingkas($p->nokp_penyelia);

        $data['soalan'] = self::getSoalan();
        $list_work = SasaranKerja::where('id_pemohon',$p->id)->where('id_lnpk',$lnpk->id)->get();
        $data['list_work'] = $list_work;
//        echo '<pre>';
//        print_r($data);
//        echo '</pre>';

        $list_work = SasaranKerja::where('id_pemohon',$p->id)->get();
        $data['work_list'] = $list_work;
        
        return view('segment.penyelia.lpnk.borang', [
            'data' => $data,
            'id_permohonan' => $p->id_permohonan,
            'pemohon' => $p,
            'ukp11' => $ukp11,
            'doc' => $file
        ]);
    }

    public function getSoalan(){
        $lpnk = LpnkParent::with('getChild')->where('delete_id', 0)->get()->toArray();
        return $lpnk;
    }

    public function post_borang(Request $request){
        $jumlah_pengawasan = $request->input('jumlah_pengawasan');
        $ulasan = $request->input('ulasan');
        $skorArr = json_decode($request->input('skorArr'));
        $id_permohonan = $request->input('id_permohonan');
        $id_pemohon = $request->input('id_pemohon');

        //$skt = $request->file('skt');

        $trigger = $request->input('trigger');
        $lnpk = Lnpk::where('id_pemohon',$id_pemohon)->first();
        if(empty($lnpk))
            $lnpk = new Lnpk;
        //$lnpk->id_permohonan = $id_permohonan;
        $lnpk->id_pemohon = $id_pemohon;
        $lnpk->ulasan = $ulasan;
        $lnpk->tempoh = $jumlah_pengawasan;
        //$lnpk->fail_skt = CommonController::upload_image($skt, 'lnpk');
        $lnpk->tkh_penilaian = Carbon::now();
        $penilai = ListPegawai2::getMaklumatPegawaiRingkas($lnpk->nokp_penilai);

        $lnpk->nama_penilai = $penilai['name'];
        $lnpk->jawatan_penilai = $penilai['jawatan'];
        $lnpk->jabatan_penilai = $penilai[''];

        if($lnpk->save()){
            foreach($skorArr as $sk){
                $model = new JawapanLpnk;
                $model->id_soalan = $sk[0];
                $model->jawapan = $sk[1];
                $model->id_lnpk = $lnpk->id;
                $model->save();
            }
        }

        $p = Pemohon::find($id_pemohon);
        //1 adalah setuju
        $p->lpnk_status = $trigger == 0 ? 1 : 2;
        // if($p->lpnk_status == 1) {
        $p->status = Pemohon::PROCESSING;
        // } else {
        //     $p->status = Pemohon::WAITING_VERIFICATION
        // }
        $p->save();

        return response()->json([
            'success' => 1,
            'data' => [
                'trigger' => $trigger
            ]
        ]);
    }

    public function view_pdf(Request $request,$id) {
        $lnpk = Lnpk::where('id_pemohon',$id)->first();
        $lpnkResult = LpnkParent::with('getChild')->where('delete_id', 0)->get();
        $total_markah = 0;
        $lpnkResult->each(function($item,$key) use ($id,$lnpk,$total_markah) {
            $item->getChild->each(function($item,$key) use ($id,$lnpk,$total_markah) {
                $model = JawapanLpnk::where('id_soalan',$item->id)->where('id_lnpk',$lnpk->id)->first();
                if($model) {
                    $item->markah = $model->jawapan;
                    $total_markah += $model->jawapan;
                } else {
                    $item->markah = '';
                }
            });
        });
        $list_work = SasaranKerja::where('id_pemohon',$id)->get();
        $pdf = PDF::loadView('pdf.lnpk', [
            'soalan' => $lpnkResult, 
            'jumlah' => $total_markah,
            'info' => $lnpk,
            'kerja' =>$list_work
        ], []);
        return $pdf->stream('lnpk_'.$lnpk->tahun.'_'.$lnpk->nokp.'.pdf');
    }
}
