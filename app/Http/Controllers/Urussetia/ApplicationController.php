<?php

namespace App\Http\Controllers\Urussetia;

use App\Http\Controllers\Controller;
use App\Models\Mykj\ListPegawai2;
use App\Models\Permohonan\Pemohon;
use App\Models\Permohonan\PermohonanUkp12;
use App\Models\Urussetia\Kumpulan;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
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

        return response()->json([
            'success' => 1,
            'data' => [
                'nama' => $peribadi->nama,
                'nokp' => $peribadi->nokp,
                'jawatan' => $pemohon->jawatan,
                'gred' => $pemohon->gred
            ]
        ]);
    }

    public function applicant_page(Request $request,$id) {
        return view('urussetia.application.applicant',['permohonan_id'=>$id]);
    }

    public function applicant_verdict(Request $request) {
        $pemohon_id = $request->input('pemohon_id');
        $verdict = $request->input('verdict');
        $record =  Pemohon::find($pemohon_id);
        if($verdict) {
            $record->status = Pemohon::SUCCESSED;
        } else {
            $record->status = Pemohon::FAILED;
        }
        $record->updated_by = Auth::user()->nokp;

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
        });

        return DataTables::of($candidates)
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
                if($pemohon->status == Pemohon::NOT_SUBMITTED) {
                    $info['status'] = 'Belum Siap';
                    $info['colour'] = 'warning';
                } else if($pemohon->status == Pemohon::WAITING_VERIFICATION) {
                    $info['status'] = 'Tunggu Pengesahan';
                    $info['colour'] = 'warning';
                } else if($pemohon->status == Pemohon::REJECTED_APPLICATION) {
                    $info['status'] = 'Tolak Tawaran';
                    $info['colour'] = 'danger';
                } else if($pemohon->status == Pemohon::PROCESSING) {
                    $info['status'] = 'Tunggu Proses';
                    $info['colour'] = 'warning';
                } else if($pemohon->status == Pemohon::SUCCESSED) {
                    $info['status'] = 'Calon Berjaya';
                    $info['colour'] = 'success';
                } else if($pemohon->status == Pemohon::FAILED) {
                    $info['status'] = 'Calon Gagal';
                    $info['colour'] = 'secondary';
                } else if($pemohon->status == Pemohon::REFUSED) {
                    $info['status'] = 'Tolak Lantikan';
                    $info['colour'] = 'dark';
                } else if($pemohon->status == Pemohon::WAITING_REPLY) {
                    $info['status'] = 'Tunggu Jawapan';
                    $info['colour'] = 'info';
                } else if($pemohon->status == Pemohon::ACCEPTED) {
                    $info['status'] = 'Terima Lantikan';
                    $info['colour'] = 'primary';
                } else if($pemohon->status == Pemohon::WAITING_VERDICT) {
                    $info['status'] = 'Tunggu Keputusan';
                    $info['colour'] = 'warning';
                }
            } else {
                $pegawai = ListPegawai2::where('nokp',$nokp)->first();
                    $info['name'] = $pegawai->nama;
                    $info['jawatan'] = $pegawai->jawatan;
                    $info['gred'] = $pegawai->kod_gred;
                    $info['status'] = 'Tiada Tindakan';
                    $info['colour'] = 'danger';
                    $info['pemohon_id'] = 0;
            }

        } else {
            $pegawai = ListPegawai2::where('nokp',$nokp)->first();
            $info['name'] = $pegawai->nama;
            $info['jawatan'] = $pegawai->jawatan;
            $info['gred'] = $pegawai->kod_gred;
            $info['status'] = 'Tiada Tindakan';
            $info['pemohon_id'] = 0;
        }

        return $info;
    }
}
