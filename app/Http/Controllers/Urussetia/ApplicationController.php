<?php

namespace App\Http\Controllers\Urussetia;

use App\Http\Controllers\Controller;
use App\Models\Mykj\ListPegawai2;
use App\Models\Permohonan\Pemohon;
use App\Models\Permohonan\PermohonanUkp12;
use App\Models\Urussetia\Kumpulan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\DataTables;

class ApplicationController extends Controller
{
    //
    public function __construct() {
        $this->middleware('auth');
    }

    public function main_page(Request $request) {
        return view('urussetia.application.index');
    }

    public function main_list() {
        $model = PermohonanUkp12::where('flag', 1)->where('delete_id',0)->get();
        return DataTables::of($model)
            ->setRowAttr([
                'data-appl-id' => function($data) {
                    return $data->id;
                }
            ])->rawColumns(['aksi'])
            ->make(true);
    }

    public function delete_application(Request $request) {
        $permohonan_id = $request->input('permohonan_id');

        $record = PermohonanUkp12::find($permohonan_id);
        $record->flag = 0;
        $record->delete_id = 1;
        if($record->save()) {
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

    public function applicant_info(Request $request) {
        $permohon_id = $request->input('id');
        $pemohon = Pemohon::find($permohon_id);
        $peribadi = $pemohon->pemohonPeribadi;
        $permohonan = $pemohon->pemohonPermohonan;

        return response()->json([
            'success' => 1,
            'data' => [
                'nama' => $peribadi->nama,
                'nokp' => $peribadi->nokp,
                'jawatan' => $pemohon->jawatan,
                'gred' => $pemohon->gred,
                'status' => $pemohon->status,
                'rank' => $pemohon->ranking,
                'bil' => $permohonan->bil_mesyuarat,
                'tkh' => empty($permohonan->tarikh_mesyuarat) ? '' : \Carbon\Carbon::parse($permohonan->tarikh_mesyuarat)->format('Y-m-d')
            ]
        ]);
    }

    public function applicant_page(Request $request,$id) {
        return view('urussetia.application.applicant',['permohonan_id'=>$id]);
    }

    public function applicant_verdict(Request $request) {
        $pemohon_id = $request->input('pemohon_id');
        $verdict = $request->input('verdict');
        $rank = $request->input('rank');
        $bil_mesyuarat = $request->input('bil');
        $tkh_mesyuarat = $request->input('date');
        $record =  Pemohon::find($pemohon_id);
        $form = PermohonanUkp12::find($record->id_permohonan);
        if($verdict == 1) {
            $record->status = Pemohon::SUCCESSED;
        } else if($verdict == 0){
            $record->status = Pemohon::FAILED;
        } else if($verdict == 2){
            $record->status = Pemohon::RESERVE;
        }
        $record->ranking = $rank;
        $record->updated_by = Auth::user()->nokp;

        if($record->save()) {
            $form->bil_mesyuarat = $bil_mesyuarat;
            $form->tarikh_mesyuarat = empty($tkh_mesyuarat) ? NULL : \Carbon\Carbon::createFromFormat('d-m-Y', $tkh_mesyuarat)->format('Y-m-d');
            $form->update_by = Auth::user()->nokp;

            $form->save();

            if($record->status == Pemohon::RESERVE) {
                $content = [
                    'title' => 'KEPUTUSAN PEMANGKUAN '.$record->pemohonPermohonan->disiplin.' GRED '.$record->gred.' KE GRED '.$record->pemohonPermohonan->gred.', JABATAN KERJA RAYA, KEMENTERIAN KERJA RAYA MALAYSIA',
                    'gelaran' => $record->pemohonPeribadi->gelaran ? $record->pemohonPeribadi->gelaran : ($record->pemohonPeribadi->jantina == 'L' ? 'Tuan' : 'Puan'),
                    'nokp' => $record->pemohonPeribadi->nokp,
                    'gred_pemangku' => $record->pemohonPermohonan->gred,
                    'count' => $form->bil_mesyuarat,
                    'year' => \Carbon\Carbon::parse($form->tarikh_mesyuarat)->format('Y-m-d'),
                    'tarikh' => \Carbon\Carbon::parse($form->tarikh_mesyuarat)->format('Y'),
                ];
                try {
                    Mail::mailer('smtp')->send('mail.simpanan-mail',$content,function($message) use ($record) {
                        // testing purpose
                        $message->to('munirahj@jkr.gov.my',$record->pemohonPeribadi->nama);
                        //
                        //$message->to($record->pemohonPeribadi->email,$record->pemohonPeribadi->nama);

                        //$message->to($kerani_user->email,$kerani_user->name);
                        $message->subject('KEPUTUSAN PEMANGKUAN '.$record->pemohonPermohonan->disiplin.' GRED '.$record->gred.' KE GRED '.$record->pemohonPermohonan->gred.', JABATAN KERJA RAYA, KEMENTERIAN KERJA RAYA MALAYSIA');

                    });
                    return response()->json([
                        'success' => 1,
                        'data' => [
                            'message' => 'Success to email (email calon simpanan)'
                        ]
                    ]);
                } catch( \Exception $e) {
                    return response()->json([
                        'success' => 0,
                        'data' => [
                            'message' => 'Failed to email (email calon simpanan)'
                        ]
                    ]);
                }
            } else if($record->status == Pemohon::FAILED) {
                $content = [
                    'title' => 'KEPUTUSAN PEMANGKUAN '.$record->pemohonPermohonan->disiplin.' GRED '.$record->gred.' KE GRED '.$record->pemohonPermohonan->gred.', JABATAN KERJA RAYA, KEMENTERIAN KERJA RAYA MALAYSIA',
                    'gelaran' => $record->pemohonPeribadi->gelaran ? $record->pemohonPeribadi->gelaran : ($record->pemohonPeribadi->jantina == 'L' ? 'Tuan' : 'Puan'),
                    'nokp' => $record->pemohonPeribadi->nokp,
                    'gred_pemangku' => $record->pemohonPermohonan->gred,
                    'count' => $form->bil_mesyuarat,
                    'year' => \Carbon\Carbon::parse($form->tarikh_mesyuarat)->format('Y-m-d'),
                    'tarikh' => \Carbon\Carbon::parse($form->tarikh_mesyuarat)->format('Y'),

                ];
                try {
                    Mail::mailer('smtp')->send('mail.gagal-mail',$content,function($message) use ($record) {
                        // testing purpose
                        //$message->to('enaikpangkat@jkr.gov.my',$record->pemohonPeribadi->nama);
                        //
                        // $message->to($record->pemohonPeribadi->email,$record->pemohonPeribadi->nama);
                        $message->to('munirahj@jkr.gov.my',$record->pemohonPeribadi->nama);

                        //$message->to($kerani_user->email,$kerani_user->name);
                        $message->subject('KEPUTUSAN PEMANGKUAN '.$record->pemohonPermohonan->disiplin.' GRED '.$record->gred.' KE GRED '.$record->pemohonPermohonan->gred.', JABATAN KERJA RAYA, KEMENTERIAN KERJA RAYA MALAYSIA');

                    });
                    return response()->json([
                        'success' => 1,
                        'data' => [
                            'message' => 'Success to email (email calon gagal)'
                        ]
                    ]);

                } catch( \Exception $e) {
                    return response()->json([
                        'success' => 0,
                        'data' => [
                            'message' => 'Failed to email (email calon gagal)'
                        ]
                    ]);
                }
            }
        } else {
            return response()->json([
                'success' => 0,
                'data' => [
                    'message' => 'Failed to save'
                ]
            ]);
        }
    }

    public function applicant_list(Request $request) {
        $permohonan_id = $request->input('id');
        $batch = Kumpulan::where('permohonan_id',$permohonan_id)->first();
        if(empty($batch->calons)) {
            $model =  collect();
        } else {
            $candidates = $batch->calons;
            $candidates->each(function ($item, $key) use ($batch) {
                $info = $this->get_info($item->nokp,$batch->permohonan_id);
                $item->email_status = empty($item->status) ? 'UNKNOWN' : $item->status;
                $item->nama = $info['name'];
                $item->jawatan = $info['jawatan'];
                $item->gred = $info['gred'];
                $item->status = $info['status'];
                $item->pemohon_id = $info['pemohon_id'];
                $item->colour = $info['colour'] ?? 'danger';
                $item->rank = $info['rank'];
                $item->batch_id = $batch->id;
                $item->pengesahan_hos = $info['pengesahan_hos'];
                $item->pengesahan_hod = $info['pengesahan_hod'];
            });
            $model = $candidates->sortBy('rank');
        }

        // print_r($model->values()->all());

        // die();
        return DataTables::of($model)
            ->setRowAttr([
                'data-calon-nokp' => function($data) {
                    return $data->nokp;
                },
                'data-pemohon-id' => function($data) {
                    return $data->pemohon_id;
                },
                'data-batch-id' => function($data) {
                    return $data->batch_id;
                }
            ])->rawColumns(['aksi'])
            ->make(true);
    }

    private function get_info($nokp,$id_permohonan) {
        $info = array();
        $user = User::where('nokp',$nokp)->first();

        //Log::debug('Pemohon -> '.print_r($pemohon));

        if($user) {
            $pemohon = Pemohon::where('user_id',$user->id)->where('pemohon.id_permohonan',$id_permohonan)->first();

            if($pemohon) {
                $pemohon->loadMissing('pemohonPeribadi');

                $info['pemohon_id'] = $pemohon->id;
                $info['name'] = $pemohon->pemohonPeribadi->nama;
                $info['jawatan'] = $pemohon->jawatan;
                $info['gred'] = $pemohon->gred;
                $info['rank'] = empty($pemohon->ranking) ? 99 : $pemohon->ranking;
                $info['status'] = $pemohon->status;
                $info['pengesahan_hos'] = empty($pemohon->pengesahan_perkhidmatan) ? 'NOT' : 'DONE';
                $info['pengesahan_hod'] = empty($pemohon->perakuan_ketua_jabatan) ? 'NOT' : 'DONE';
                if($pemohon->status == Pemohon::NOT_SUBMITTED) {
                    $info['colour'] = 'warning';
                } else if($pemohon->status == Pemohon::WAITING_VERIFICATION) {

                    $info['colour'] = 'warning';
                } else if($pemohon->status == Pemohon::REJECTED_APPLICATION) {

                    $info['colour'] = 'danger';
                } else if($pemohon->status == Pemohon::PROCESSING) {

                    $info['colour'] = 'warning';
                } else if($pemohon->status == Pemohon::SUCCESSED) {

                    $info['colour'] = 'success';
                } else if($pemohon->status == Pemohon::FAILED) {

                    $info['colour'] = 'secondary';
                } else if($pemohon->status == Pemohon::REFUSED) {

                    $info['colour'] = 'dark';
                } else if($pemohon->status == Pemohon::WAITING_REPLY) {

                    $info['colour'] = 'info';
                } else if($pemohon->status == Pemohon::ACCEPTED) {

                    $info['colour'] = 'primary';
                } else if($pemohon->status == Pemohon::WAITING_VERDICT) {

                    $info['colour'] = 'warning';
                } else if($pemohon->status == Pemohon::RESERVE) {

                    $info['colour'] = 'info';
                }
            } else {
                $pegawai = ListPegawai2::where('nokp',$nokp)->first();
                    $info['name'] = $pegawai->nama;
                    $info['jawatan'] = $pegawai->jawatan;
                    $info['gred'] = $pegawai->kod_gred;
                    $info['status'] = 'NA';
                    $info['colour'] = 'danger';
                    $info['pemohon_id'] = 0;
                    $info['rank'] = 99;
                    $info['pengesahan_hos'] = 'NOT';
                    $info['pengesahan_hod'] = 'NOT';
            }

        } else {
            $pegawai = ListPegawai2::where('nokp',$nokp)->first();
            $info['name'] = empty($pegawai->nama) ? '' : $pegawai->nama;
            $info['jawatan'] = empty($pegawai->jawatan) ? '' : $pegawai->jawatan;
            $info['gred'] = empty($pegawai->kod_gred) ? '' : $pegawai->kod_gred;
            $info['status'] = 'NA';
            $info['pemohon_id'] = 0;
            $info['colour'] = 'danger';
            $info['rank'] = 99;
            $info['pengesahan_hos'] = 'NOT';
            $info['pengesahan_hod'] = 'NOT';
        }

        return $info;
    }

    // naik pangkat realm
    public function send_promotion(Request $request,$id) {

        $pemohon = Pemohon::find($id);

        //
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
                $secure_link = Crypt::encryptString($applicant->id);

                $content = [
                    //'link' => "http://mywebapp/form/ukp12/display/1?kp=".$calon->nokp
                    'link' => url('/')."/naikpangkat/ukp13/mohon/".$secure_link,
                    'gred' => $application->gred,
                    'date' => Carbon::now()->addDays(14)->format('d M Y'),
                    'title' => 'URUSAN KENAIKAN PANGKAT '.$pemohon->jawatan.' KE GRED '.$application->gred.' DI JABATAN KERJA RAYA MALAYSIA'
                ];
                Mail::mailer('smtp')->send('mail.naikpangkat-mail',$content,function($message) use ($application,$user1,$pemohon) {
                    // testing purpose
                    $message->to('munirahj@jkr.gov.my',$user1->nama);
                    //$message->to('munirahj@jkr.gov.my',$calon->nama);

                    //$message->to($user1->email,$user1->name);
                    $message->subject('URUSAN KENAIKAN PANGKAT '.$pemohon->jawatan.' KE GRED '.$application->gred.' DI JABATAN KERJA RAYA MALAYSIA');

                });

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
        } else {
            return response()->json([
                'success' => 0,
                'data' => []
            ]);
        }
    }
}
