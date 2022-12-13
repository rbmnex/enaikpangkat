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
        ->leftJoin('surat_pink as pk','p.id','pk.id_pemohon')
        ->select('p.id','b.nokp','b.nama','p.jawatan','u.gred','u.jenis','p.status','pk.email_status')
        ->whereIn('p.status', array(Pemohon::WAITING_OFFER, Pemohon::WAITING_REPLY, Pemohon::ACCEPTED, Pemohon::REFUSED))
        ->where('p.flag',1)
        ->where('jenis','UKP12')
        ->where('p.delete_id',0)
        ->where('p.flag',1)
        ->where('pk.delete_id',0)
        ->where('pk.flag',1)
        ->get();

        // $model->each(function($item,$key){

        // });
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
        $id = 0;
        if($pinks->count() > 1) {
            foreach($pinks as $p){
                $p->delete();
            }
            $pink = CommonController::getModel(SuratPink::class, $id);
        } else if($pinks->count() == 1) {
            $id = $pinks[0]->id;
            $pink = CommonController::getModel(SuratPink::class, 1, $id);
        } else if($pinks->count() == 0) {
            $id = 0;
            $pink = CommonController::getModel(SuratPink::class, $id);
        }
        $pink = CommonController::getModel(SuratPink::class, $id);
        $pink->id_pemohon = $request->input('pemohon_id');
        $pink->no_surat = $request->input('pinkform_name');
        $pink->tkh_lapor_diri = CommonController::dateAugment($request->input('pinkform_tkh'));
        $pink->save();

        if($request->file('pinkform_borang')){
            $upload = CommonController::base64_upload($request->file('pinkform_borang'));
            if($pink->fail_id) {
                $file = File::find($pink->fail_id);
            } else {
                $file = new File;
            }
            $file->content_bytes = $upload['base64'];
            $file->ext = $upload['ext'];
            $file->filename = $pink->id.'.'.$upload['ext'];
            $file->save();
        }
        $pink->fail_id = $file->id;
        $pink->save();

        $ukp11s = PenerimaanUkp11::where('id_surat_pink', $pink->id)->get();
        if($ukp11s->count() > 1) {
            foreach($ukp11s as $u){
                $u->delete();
            }
            $ukp11 = CommonController::getModel(PenerimaanUkp11::class, 0);
        } else if($ukp11s->count() == 1) {
            $idp = $ukp11s[0]->id;
            $ukp11 = CommonController::getModel(PenerimaanUkp11::class, 1, $idp);
        } else if($pinks->count() == 0) {

            $ukp11 = CommonController::getModel(PenerimaanUkp11::class, 0);
        }
        //$ukp11 = CommonController::getModel(PenerimaanUkp11::class, 0);
        $ukp11->id_surat_pink = $pink->id;
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
        try{
            Mail::mailer('smtp')->send('mail.lapordiri-mail',$content,function ($message) use ($pemohon,$file) {
                // testing purpose
                //$message->to('rubmin@vn.net.my',$pemohon->pemohonPeribadi->nama);

    //            $message->to($pemohon->pemohonPeribadi->email,$pemohon->pemohonPeribadi->nama);
                $message->to('rubmin@vn.net.my',$pemohon->pemohonPeribadi->nama);
                $message->subject('PENGESAHAN LAPOR DIRI PEGAWAI UNTUK URUSAN PEMANGKUAN');

            });
            $pink->email_status = "SUCCESSED";
            $pink->save();
            return response()->json([
                'success' => 1,
            ]);
        } catch (\Exception $e) {
            $pink->email_status = "FAILED";
            $pink->save();
            return response()->json([
                'success' => 0,
            ]);
        }

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

    public function resend(Request $request,$id) {
        $record = SuratPink::where('id_pemohon',$id)->first();
    }
}
