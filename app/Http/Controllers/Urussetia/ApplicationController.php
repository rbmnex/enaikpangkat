<?php

namespace App\Http\Controllers\Urussetia;

use App\Http\Controllers\Controller;
use App\Models\Mykj\ListPegawai2;
use App\Models\Permohonan\Pemohon;
use App\Models\Permohonan\PermohonanUkp12;
use App\Models\Urussetia\Kumpulan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

            if($record->status == Pemohon::RESERVE) {
                $content = [
                    'title' => 'KEPUTUSAN PEMANGKUAN '.$record->pemohonPermohonan->disiplin.' GRED '.$record->gred.' KE GRED '.$record->pemohonPermohonan->gred.', JABATAN KERJA RAYA, KEMENTERIAN KERJA RAYA MALAYSIA',
                    'gelaran' => $record->pemohonPeribadi->gelaran ? $record->pemohonPeribadi->gelaran : ($record->pemohonPeribadi->jantina == 'L' ? 'Tuan' : 'Puan'),
                    'nokp' => $record->pemohonPeribadi->nokp,
                    'gred_pemangku' => $record->pemohonPermohonan->gred,
                    'count' => $form->bil_mesyuarat,
                    'year' => \Carbon\Carbon::parse($form->bil_mesyuarat)->format('Y-m-d'),
                    'tarikh' => \Carbon\Carbon::parse($form->bil_mesyuarat)->format('Y'),
                ];
                Mail::mailer('smtp')->send('mail.pengesahan-mail',$content,function($message) use ($record) {
                    // testing purpose
                    //$message->to('rubmin@vn.net.my',$record->pemohonPeribadi->nama);
                    //
                    $message->to($record->pemohonPeribadi->email,$record->pemohonPeribadi->nama);

                    //$message->to($kerani_user->email,$kerani_user->name);
                    $message->subject('KEPUTUSAN PEMANGKUAN '.$record->pemohonPermohonan->disiplin.' GRED '.$record->gred.' KE GRED '.$record->pemohonPermohonan->gred.', JABATAN KERJA RAYA, KEMENTERIAN KERJA RAYA MALAYSIA');

                });
            } else if($record->status == Pemohon::FAILED) {
                $content = [
                    'title' => 'KEPUTUSAN PEMANGKUAN '.$record->pemohonPermohonan->disiplin.' GRED '.$record->gred.' KE GRED '.$record->pemohonPermohonan->gred.', JABATAN KERJA RAYA, KEMENTERIAN KERJA RAYA MALAYSIA',
                    'gelaran' => $record->pemohonPeribadi->gelaran ? $record->pemohonPeribadi->gelaran : ($record->pemohonPeribadi->jantina == 'L' ? 'Tuan' : 'Puan'),
                    'nokp' => $record->pemohonPeribadi->nokp,
                    'gred_pemangku' => $record->pemohonPermohonan->gred,
                    'count' => $form->bil_mesyuarat,
                    'year' => \Carbon\Carbon::parse($form->bil_mesyuarat)->format('Y-m-d'),
                    'tarikh' => \Carbon\Carbon::parse($form->bil_mesyuarat)->format('Y'),

                ];
                Mail::mailer('smtp')->send('mail.gagal-mail',$content,function($message) use ($record) {
                    // testing purpose
                    //$message->to('enaikpangkat@jkr.gov.my',$record->pemohonPeribadi->nama);
                    //
                     $message->to($record->pemohonPeribadi->email,$record->pemohonPeribadi->nama);

                    //$message->to($kerani_user->email,$kerani_user->name);
                    $message->subject('KEPUTUSAN PEMANGKUAN '.$record->pemohonPermohonan->disiplin.' GRED '.$record->gred.' KE GRED '.$record->pemohonPermohonan->gred.', JABATAN KERJA RAYA, KEMENTERIAN KERJA RAYA MALAYSIA');

                });
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

    public function applicant_list(Request $request) {
        $permohonan_id = $request->input('id');
        $batch = Kumpulan::where('permohonan_id',$permohonan_id)->first();
        $candidates = $batch->calons;
        $candidates->each(function ($item, $key) use ($batch) {
            $info = $this->get_info($item->nokp,$batch->permohonan_id);
            $item->nama = $info['name'];
            $item->jawatan = $info['jawatan'];
            $item->gred = $info['gred'];
            $item->status = $info['status'];
            $item->pemohon_id = $info['pemohon_id'];
            $item->colour = $info['colour'];
            $item->rank = $info['rank'];
        });
        $model = $candidates->sortBy('rank');

        // print_r($model->values()->all());

        // die();
        return DataTables::of($model)
            ->setRowAttr([
                'data-calon-nokp' => function($data) {
                    return $data->nokp;
                },
                'data-pemohon-id' => function($data) {
                    return $data->pemohon_id;
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
            }

        } else {
            $pegawai = ListPegawai2::where('nokp',$nokp)->first();
            $info['name'] = $pegawai->nama;
            $info['jawatan'] = $pegawai->jawatan;
            $info['gred'] = $pegawai->kod_gred;
            $info['status'] = 'NA';
            $info['pemohon_id'] = 0;
            $info['colour'] = 'danger';
            $info['rank'] = 99;
        }

        return $info;
    }
}
