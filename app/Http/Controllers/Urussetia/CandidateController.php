<?php

namespace App\Http\Controllers\Urussetia;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Common\CommonController;
use App\Models\Permohonan\Pemohon;
use App\Models\Permohonan\PermohonanUkp12;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CandidateController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('urussetia.candidate.index');
    }

    public function load() {
        $model = DB::connection('pgsql')->table('pemohon')
                    ->join('penerimaan_ukp11','pemohon.id','penerimaan_ukp11.id_pemohon')
                    ->join('permohonan_ukp12','pemohon.id_permohonan','permohonan_ukp12.id')
                    ->join('peribadi','pemohon.id_peribadi','peribadi.id')
                    ->select('pemohon.id as pemohon_id','permohonan_ukp12.id as permohonan_id','pemohon.jawatan','pemohon.gred','pemohon.status','permohonan_ukp12.gred as gred_pemangkuan', 'peribadi.nokp', 'penerimaan_ukp11.tkh_kuatkuasa_pemangkuan','peribadi.nama', 'pemohon.flag')
                    ->where('pemohon.status','TL')
                    //->where('pemohon.flag',1)
                    ->where('pemohon.delete_id',0)
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
                    ->addColumn('pangkat',function($data) {
                        return $data->jawatan.' '.$data->gred;
                    })
                    ->addColumn('tempoh',function($data) {
                        return Carbon::parse($data->tkh_kuatkuasa_pemangkuan)->diffForHumans(Carbon::now());
                    })
                    ->rawColumns(['aksi'])
                    ->make(true);
    }

    // naik pangkat realm
    public function send_promotion(Request $request) {
        $id = $request->input('id');
        $pemohon = Pemohon::find($id);
        $pemohon->flag = 2;
        $pemohon->save();

        $application =  new PermohonanUkp12();
        $application->jenis = 'UKP13';
        $application->jawatan = $pemohon->pemohonPermohonan->jawatan;
        $application->kod_jawatan = $pemohon->pemohonPermohonan->kod_jawatan;
        $application->gred = $pemohon->pemohonPermohonan->gred;
        $application->kod_disiplin = $pemohon->pemohonPermohonan->kod_disiplin;
        $application->disiplin = $pemohon->pemohonPermohonan->disiplin;
        $application->tajuk = $pemohon->pemohonPermohonan->tajuk;
        $application->created_by = empty(Auth::user()) ? 'SYSTEM' : Auth::user()->nokp;
        $application->updated_by = empty(Auth::user()) ? 'SYSTEM' : Auth::user()->nokp;
        $application->flag =  1;
        $application->delete_id = 0;

        if($application->save()) {
            $applicant =  new Pemohon();
            $applicant->id_permohonan = $application->id;
            $applicant->flag = 1;
            $applicant->delete_id = 0;
            $applicant->created_by = empty(Auth::user()) ? 'SYSTEM' : Auth::user()->nokp;
            $applicant->updated_by = empty(Auth::user()) ? 'SYSTEM' : Auth::user()->nokp;
            $applicant->jawatan = $pemohon->jawatan;
            $applicant->kod_jawatan = $pemohon->kod_jawatan;
            $applicant->gred = $pemohon->gred;
            $applicant->user_id = $pemohon->user_id;
            $applicant->status = 'NA';

            $user1 =  User::find($pemohon->user_id);

            if($applicant->save()) {
                //send email
                $common = new CommonController();
                $secure_link = Crypt::encryptString($applicant->id);
                $dateline = $common->calc_DateOnWorkingDays(7);

                $content = [
                    //'link' => "http://mywebapp/form/ukp12/display/1?kp=".$calon->nokp
                    'link' => url('/')."/naikpangkat/ukp13/mohon/".$secure_link,
                    'gred' => $application->gred,
                    'date' => $dateline->format('d M Y'),
                    'title' => 'URUSAN KENAIKAN PANGKAT '.$pemohon->jawatan.' KE GRED '.$application->gred.' DI JABATAN KERJA RAYA MALAYSIA'
                ];
                try {
                    Mail::mailer('smtp')->send('mail.naikpangkat-mail',$content,function($message) use ($application,$user1,$pemohon) {
                        // testing purpose
                        //$message->to('munirahj@jkr.gov.my',$user1->nama);
                        //$message->to('rubmin@vn.net.my',$user1->name);

                        $message->to($user1->email,$user1->name);
                        $message->subject('URUSAN KENAIKAN PANGKAT '.$pemohon->jawatan.' KE GRED '.$application->gred.' DI JABATAN KERJA RAYA MALAYSIA');

                    });

                    return response()->json([
                        'success' => 1,
                        'data' => [
                            'msg' => 'Details save and email sent'
                        ]
                    ]);
                } catch (\Exception $e) {
                    return response()->json([
                        'success' => 1,
                        'data' => [
                            'msg' => 'Details save but email failed'
                        ]
                    ]);
                }

            } else {
                return response()->json([
                    'success' => 0,
                    'data' => []
                ]);
            }
        } else {
            return response()->json([
                'success' => 0,
                'data' => []
            ]);
        }
    }
}
