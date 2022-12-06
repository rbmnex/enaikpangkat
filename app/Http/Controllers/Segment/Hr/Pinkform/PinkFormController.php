<?php
namespace App\Http\Controllers\Segment\Hr\Pinkform;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Common\CommonController;
use App\Models\Permohonan\Pemohon;
use App\Models\Permohonan\PenerimaanUkp11;
use App\Models\Pink\SuratPink;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PHP_CodeSniffer\Util\Common;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Mail;
use App\Models\File;

class PinkFormController extends Controller{
    public function index(){
        return view('segment.hr.pinkform.index');
    }

    public function getPinkFormList(){
        $model = DB::connection('pgsql')->table('pemohon as p')
        ->join('peribadi as b','p.id_peribadi','b.id')
        ->join('permohonan_ukp12 as u','p.id_permohonan','u.id')
        ->select('p.id','b.nokp','b.nama','p.jawatan','u.gred','u.jenis','p.status')
        ->whereIn('p.status', array(Pemohon::SUCCESSED, Pemohon::WAITING_REPLY, Pemohon::ACCEPTED))
        ->where('p.flag',1)
        ->where('jenis','UKP12')
        ->where('p.delete_id',0)
        ->get();

        return DataTables::of($model)
            ->setRowAttr([
                'data-pemohon-id' => function($data) {
                    return $data->id;
                },
                'data-person-nokp' => function($data) {
                    return $data->nokp;
                }
            ])
            ->addColumn('nokp', function($data){
                return $data->nokp;
            })
            ->addColumn('action', function($data){
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function hantar(Request $request){
        $pinks = SuratPink::where('id_pemohon')->get();
        if($pinks->count() > 0) {
            foreach($pinks as $p){
                $p->delete_id = 1;
                $p->flag = 0;
                $p->save();
            }
        }
        $pink = CommonController::getModel(SuratPink::class, 0);
        $pink->id_pemohon = $request->input('pemohon_id');
        $pink->no_surat = $request->input('pinkform_name');
        $pink->tkh_lapor_diri = CommonController::dateAugment($request->input('pinkform_tkh'));
        $pink->save();

        if($request->file('pinkform_borang')){
            $upload = CommonController::base64_upload($request->file('pinkform_borang'));
            $file = new File;
            $file->content_bytes = $upload['base64'];
            $file->ext = $upload['ext'];
            $file->filename = $pink->id.'.'.$upload['ext'];
            $file->save();
        }
        $pink->fail_id = $file->id;
        $pink->save();

        $ukp11 = CommonController::getModel(PenerimaanUkp11::class, 0);
        $ukp11->id_pemohon = $pink->id_pemohon;
        $ukp11->save();

        $pemohon = CommonController::getModel(Pemohon::class, 1, $pink->id_pemohon);
        $pemohon->status = Pemohon::WAITING_REPLY;
        $pemohon->save();
        $pemohon->loadMissing('pemohonPeribadi');
        $content = [
            'link' => url('/').'/pemangku/tawaran/update/'.$pemohon->id,
            'pink' => url('/').'/common/id-download?fileid='.$file->id,
            'jawatan' => $pemohon->jawatan
        ];
        //send email
        Mail::mailer('smtp')->send('mail.lapordiri-mail',$content,function ($message) use ($pemohon,$file) {
            // testing purpose
            //$message->to('rubmin@vn.net.my',$pemohon->pemohonPeribadi->nama);

//            $message->to($pemohon->pemohonPeribadi->email,$pemohon->pemohonPeribadi->nama);
            $message->to('rubmin@vn.net.my',$pemohon->pemohonPeribadi->nama);
            $message->subject('PENGESAHAN LAPOR DIRI PEGAWAI UNTUK URUSAN PEMANGKUAN');

        });

        return response()->json([
            'success' => 1,
        ]);
    }

    public function papar(Request $request) {
        $id_pemohon = $request->input('pemohon_id');
        $pemohon = Pemohon::with('pemohonPeribadi', 'pemohonPink', 'pemohonPermohonan')->where('id', $id_pemohon)->first();
        $ukp11 = PenerimaanUkp11::where('id_pemohon', $id_pemohon)->first();
        return view('segment.pemangku.tawaran.tawaran_view', [
            'data' => $pemohon,
            'pemohon_id' => $id_pemohon,
            'ukp11' => $ukp11
        ]);
    }

    public function display_pink(Request $request,$id) {
        $record = SuratPink::where('id_pemohon',$id)->first();
        if(empty($record)) {
            return view('form.message',['message' => 'Surat Belum Dimuat naik, Sila lakukan dengan segera!']);
        } else {
            if(empty($record->fail_id)) {
                return view('form.message',['message' => 'Surat Belum Dimuat naik, Sila lakukan dengan segera!']);
            } else {
                $common = new \App\Http\Controllers\Main\CommonController;
                $request->merge(['fileid' => $record->fail_id]);
                return $common->download_by_id($request);
            }
        }
    }
}
