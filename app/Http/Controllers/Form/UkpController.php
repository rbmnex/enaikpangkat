<?php

namespace App\Http\Controllers\Form;

use App\Http\Controllers\Common\CommonController;
use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\MyKj\Cuti;
use App\Models\Mykj\Gaji;
use App\Models\MyKj\Harta;
use App\Models\Mykj\Kelayakan;
use App\Models\MyKj\Pengalaman;
use App\Models\Mykj\Peristiwa;
use App\Models\MyKj\Waris;
use App\Models\Permohonan\Akademik;
use App\Models\Permohonan\Cuti as PermohonanCuti;
use App\Models\Permohonan\Harta as PermohonanHarta;
use App\Models\Permohonan\Kompetensi;
use App\Models\Permohonan\Pasangan;
use App\Models\Permohonan\Pemohon;
use App\Models\Permohonan\PengakuanPemohon;
use App\Models\Permohonan\Pengiktirafan;
use App\Models\Permohonan\Perkhidmatan;
use App\Models\Permohonan\Pertubuhan;
use App\Models\Permohonan\PinjamanPendidikan;
use App\Models\Permohonan\Professional;
use App\Models\Profail\Peribadi;
use App\Models\Urussetia\Calon;
use App\Models\User;
use App\Pdf\Ukp12Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class UkpController extends Controller
{
    //

    // not used
    public function call(Request $request,$id) {
        $nokp = $request->input('kp');

        $mykjPeribadi = DB::connection('pgsqlmykj')->table('public.peribadi as p')
                ->leftJoin('public.l_agama as la', 'p.kod_agama', 'la.kod_agama')
                ->leftJoin('public.l_taraf_perkahwinan as ltp', 'p.kod_taraf_perkahwinan', 'ltp.kod_taraf_perkahwinan')
                ->leftJoin('public.l_bangsa as lb', 'p.kod_bangsa', 'lb.kod_bangsa')
                ->leftJoin('public.l_negeri as ln2', 'p.kod_negeri_lahir', 'ln2.kod_negeri')
                ->select('p.*','la.agama','ltp.taraf_perkahwinan', 'lb.bangsa', 'ln2.negeri as negeri_lahir')
                ->where('p.nokp',$nokp)->first();

                $tempat = DB::connection('pgsqlmykj')->table('penempatanx as p')
                ->select('p.kod_waran')->where('nokp',$nokp)->where('flag',1)->first();

                $khidmat = DB::connection('pgsqlmykj')->table('perkhidmatan as p')
                ->join('l_jawatan as j', 'j.kod_jawatan', 'p.kod_jawatan')
                ->select('p.kod_gred','p.kod_jawatan','j.jawatan','p.tkh_lantik', 'p.tkh_sah_perkhidmatan')
                ->where('nokp',$nokp)->where('flag',1)->first();


        $gaji = Gaji::where('nokp',$nokp)->where('flag',1)->first();

                $maklumat = array();
                $maklumat['nama'] = $mykjPeribadi->nama;
                $maklumat['nokp_baru'] = $mykjPeribadi->nokp;
                $maklumat['nokp_lama'] = $mykjPeribadi->nokp_lama;
                $maklumat['jawatan'] = $khidmat->jawatan;
                $maklumat['gred'] = $khidmat->kod_gred;
                $maklumat['tkh_lantikan'] = $khidmat->tkh_lantik;
                $maklumat['tkh_sah'] = $khidmat->tkh_sah_perkhidmatan;
                $maklumat['umur_besara'] = $mykjPeribadi->pilihan_bersara_wajib;
                $maklumat['alamat_pejabat'] = $mykjPeribadi->alamat_pejabat;
                $maklumat['tel_pejabat'] = $mykjPeribadi->tel_pejabat;
                $maklumat['no_faks'] = $mykjPeribadi->fax_pejabat;
                $maklumat['no_hp'] = $mykjPeribadi->tel_bimbit;
                $maklumat['email'] = $mykjPeribadi->email;
                $maklumat['jantina'] = $mykjPeribadi->jantina;
                $maklumat['bangsa'] = $mykjPeribadi->bangsa;
                $maklumat['agama'] = $mykjPeribadi->agama;
                $maklumat['tkh_lahir'] = $mykjPeribadi->tkh_lahir;
                $maklumat['tmpt_lahir'] = $mykjPeribadi->negeri_lahir;
                $maklumat['gaji'] = empty($gaji) ? 0 : $gaji->gaji_pokok;
                $maklumat['alamat_rumah'] = $mykjPeribadi->alamat;
                $maklumat['gelaran'] =  $mykjPeribadi->gelaran;

        return view('form.ukp12',[
            "profile" => $maklumat
        ]);

    }

    // for testing
    public function open(Request $request,$id) {
        $nokp = $request->input('kp');

        $access = $this->verify_applicant($nokp,$id);

        if(!$access) {
            return view('form.message',['message' => 'Anda Tidak Layak Untuk Mengambil Permohonan Ini!']);
        }


        $profile = NULL;
        $pemohon = NULL;

        $user = User::where('nokp',$nokp)->first();

        if(empty($user)) {
            User::upsert($nokp);
            $user = User::where('nokp',$nokp)->first();

            $profile = Peribadi::where('users_id',$user->id)->where('flag',1)->where('delete_id',0)->first();

            $pemohon = new Pemohon;
            $pemohon->flag = 1;
            $pemohon->delete_id = 0;
            $pemohon->id_permohonan = $id;
            $pemohon->id_peribadi = $profile->id;
            $pemohon->created_by = $nokp;
            $pemohon->updated_by = $nokp;
            $pemohon->status = Pemohon::NOT_SUBMITTED;
            $pemohon->user_id = $user->id;
            $pemohon->save();
        } else {
            $pemohon = Pemohon::where('id_permohonan', $id)->where('user_id',$user->id)->first();

            if($pemohon) {
                $profile = Peribadi::find($pemohon->id_peribadi);

                if($pemohon->status == Pemohon::NOT_SUBMITTED) {
                    $profile = Peribadi::update_peribadi($profile,$nokp);
                } else {
                    return view('form.message',['message' => 'Anda Sudah Menghantar Pemohonan Ini Dan Sedang Diproses, Diharap Sabar Menunggu Keputusan!']);
                }

            } else {
                $profile = Peribadi::recreate($user->id,$nokp);

                $pemohon = new Pemohon;
                $pemohon->flag = 1;
                $pemohon->delete_id = 0;
                $pemohon->id_permohonan = $id;
                $pemohon->id_peribadi = $profile->id;
                $pemohon->created_by = $nokp;
                $pemohon->updated_by = $nokp;
                $pemohon->status = Pemohon::NOT_SUBMITTED;
                $pemohon->user_id = $user->id;
                $pemohon->save();
            }
        }

        $maklumat = $this->load_info($profile,$nokp,$pemohon->id);

        return view('form.ukp12',[
            "profile" => $maklumat,
            "pemohon_id" =>$pemohon->id
        ]);
    }

    public function apply(Request $request,$encrypted) {
        $content = Crypt::decryptString($encrypted);
        $values = explode('?',$content);
        $formId =  $values[0];
        $nokp = substr($values[1],3);

        $userKp = Auth::user()->nokp;

        if($userKp != $nokp) {
            return view('form.message',['message' => 'Anda Tidak Layak Untuk Mengambil Permohonan Ini!']);
        }

        $access = $this->verify_applicant($nokp,$formId);

        if(!$access) {
            return view('form.message',['message' => 'Anda Tidak Layak Untuk Mengambil Permohonan Ini!']);
        }

        $profile = NULL;
        $pemohon = NULL;

        $user = User::where('nokp',$nokp)->first();

        if(empty($user)) {
            User::upsert($nokp);
            $user = User::where('nokp',$nokp)->first();

            $profile = Peribadi::where('users_id',$user->id)->where('flag',1)->where('delete_id',0)->first();

            $pemohon = new Pemohon;
            $pemohon->flag = 1;
            $pemohon->delete_id = 0;
            $pemohon->id_permohonan = $formId;
            $pemohon->id_peribadi = $profile->id;
            $pemohon->created_by = $nokp;
            $pemohon->updated_by = $nokp;
            $pemohon->status = Pemohon::NOT_SUBMITTED;
            $pemohon->user_id = $user->id;
            $pemohon->save();
        } else {
            $pemohon = Pemohon::where('id_permohonan', $formId)->where('user_id',$user->id)->first();

            if($pemohon) {
                $profile = Peribadi::find($pemohon->id_peribadi);

                if($pemohon->status == Pemohon::NOT_SUBMITTED) {
                    $profile = Peribadi::update_peribadi($profile,$nokp);
                } else {
                    return view('form.message',['message' => 'Anda Sudah Menghantar Pemohonan Ini Dan Sedang Diproses, Diharap Sabar Menunggu Keputusan!']);
                }

            } else {
                $profile = Peribadi::recreate($user->id,$nokp);

                $pemohon = new Pemohon;
                $pemohon->flag = 1;
                $pemohon->delete_id = 0;
                $pemohon->id_permohonan = $formId;
                $pemohon->id_peribadi = $profile->id;
                $pemohon->created_by = $nokp;
                $pemohon->updated_by = $nokp;
                $pemohon->status = Pemohon::NOT_SUBMITTED;
                $pemohon->user_id = $user->id;
                $pemohon->save();
            }
        }

        $maklumat = $this->load_info($profile,$nokp,$pemohon);

        return view('form.ukp12',[
            "profile" => $maklumat,
            "pemohon_id" =>$pemohon->id
        ]);
    }

    public function save_organization(Request $request) {
        $nama = $request->input('nama');
        $jawatan = $request->input('jawatan');
        $tahun = $request->input('tahun');
        $id = $request->input('pemohonId');
        $nokp = $request->input('nokp');

        $model = new Pertubuhan;
        $model->flag = 1;
        $model->delete_id = 0;
        $model->nama = $nama;
        $model->jawatan = $jawatan;
        $model->tahun = $tahun;
        $model->pemohon_id = $id;
        $model->created_by = $nokp;
        $model->updated_by = $nokp;

        if($model->save()) {
            return response()->json([
                'success' => 1,
                'data' => [
                    'jawatan' => $model->jawatan,
                    'tempat' => $model->nama,
                    'tahun' => $model->tahun,
                    'id' => $model->id
                ]
            ]);
        } else {
            return response()->json([
                'success' => 0,
                'data' => []
            ]);
        }
    }

    public function delete_organization(Request $request) {
        $pertubuhanId =  $request->input('id');

        $model = Pertubuhan::find($pertubuhanId);

        if($model->delete()) {
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

    public function save_harta(Request $request) {
        $file = $request->file('lampiran_e');
        $formdata = json_decode($request->input('formdata'));

        $file_info = CommonController::base64_upload($file);

        $harta = PermohonanHarta::where('id_pemohon',$formdata->pemohon_id)->first();

            if($harta) {
                $harta->tkh_akhir_pengisytiharan = $formdata->tkh_istihar;
                $uploadedFile = File::find($harta->surat_kelulusan_id);
                $uploadedFile->content_bytes = $file_info['base64'];
                $uploadedFile->ext = $file_info['ext'];
                $uploadedFile->filename = $file->getClientOriginalName();
                $harta->updated_by = Auth::user()->nokp;
                if($uploadedFile->save()) {
                    $harta->save();

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
                $uploadedFile = new File;
                $uploadedFile->content_bytes = $file_info['base64'];
                $uploadedFile->ext = $file_info['ext'];
                $uploadedFile->filename = $file->getClientOriginalName();
                if($uploadedFile->save()) {
                    $harta =  new PermohonanHarta;
                    $harta->tkh_akhir_pengisytiharan = $formdata->tkh_istihar;
                    $harta->surat_kelulusan_id = $uploadedFile->id;
                    $harta->id_pemohon = $formdata->pemohon_id;
                    $harta->flag = 1;
                    $harta->delete_id = 0;
                    $harta->created_by = Auth::user()->nokp;
                    $harta->updated_by = Auth::user()->nokp;
                    $harta->save();

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
    }

    public function save_loan(Request $request) {
        $file = $request->file('penyata_bayaran');
        $file_info = CommonController::base64_upload($file);

        $formdata = json_decode($request->input('formdata'));
        $status = $request->input('status');
        $nama_institusi = $request->input('nama');
        $tkh_mula_pinjaman = $request->input('mula');
        $tkh_akhir_pinjaman = $request->input('akhir');
        $tkh_mula_bayaran = $request->input('bayar');
        $jumlah_pinjaman = $request->input('jumlah');
        $tkh_selesai_bayaran = $request->input('selesai');
        //surat_perakuan
        //id_pemohon
        //flag
        //delete_id
        $loan = PinjamanPendidikan::where('id_pemohon',$formdata->pemohon_id)->first();
        if($loan) {
            $uploadedFile = File::find($loan->surat_kelulusan_id);
            $uploadedFile->content_bytes = $file_info['base64'];
                $uploadedFile->ext = $file_info['ext'];
                $uploadedFile->filename = $file->getClientOriginalName();
            if($uploadedFile->save()) {
                $loan->status = $status;
                $loan->nama_institusi = $nama_institusi;
                $loan->tkh_mula_pinjaman = empty($tkh_mula_pinjaman) ? NULL : Carbon::createFromFormat('d-m-Y', $tkh_mula_pinjaman)->format('Y-m-d');
                $loan->tkh_akhir_pinjaman = empty($tkh_akhir_pinjaman) ? NULL : Carbon::createFromFormat('d-m-Y', $tkh_akhir_pinjaman)->format('Y-m-d');
                $loan->tkh_mula_bayaran = empty($tkh_mula_bayaran) ? NULL : Carbon::createFromFormat('d-m-Y', $tkh_mula_bayaran)->format('Y-m-d');
                $loan->tkh_selesai_bayaran = empty($tkh_selesai_bayaran) ? NULL : Carbon::createFromFormat('d-m-Y', $tkh_selesai_bayaran)->format('Y-m-d');
                $loan->jumlah_pinjaman = $jumlah_pinjaman;
                $loan->updated_by = Auth::user()->nokp;
                $loan->id_pemohon = $formdata->pemohon_id;

                $loan->save();

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
            $uploadedFile = new File;
                $uploadedFile->content_bytes = $file_info['base64'];
                $uploadedFile->ext = $file_info['ext'];
                $uploadedFile->filename = $file->getClientOriginalName();
            if($uploadedFile->save()) {
                $loan = new PinjamanPendidikan;
                $loan->flag = 1;
                $loan->delete_id = 0;
                $loan->status = $status;
                $loan->nama_institusi = $nama_institusi;
                $loan->tkh_mula_pinjaman = empty($tkh_mula_pinjaman) ? NULL : Carbon::createFromFormat('d-m-Y', $tkh_mula_pinjaman)->format('Y-m-d');
                $loan->tkh_akhir_pinjaman = empty($tkh_akhir_pinjaman) ? NULL : Carbon::createFromFormat('d-m-Y', $tkh_akhir_pinjaman)->format('Y-m-d');
                $loan->tkh_mula_bayaran = empty($tkh_mula_bayaran) ? NULL : Carbon::createFromFormat('d-m-Y', $tkh_mula_bayaran)->format('Y-m-d');
                $loan->tkh_selesai_bayaran = empty($tkh_selesai_bayaran) ? NULL : Carbon::createFromFormat('d-m-Y', $tkh_selesai_bayaran)->format('Y-m-d');
                $loan->jumlah_pinjaman = $jumlah_pinjaman;
                $loan->surat_perakuan = $uploadedFile->id;
                $loan->created_by = Auth::user()->nokp;
                $loan->updated_by = Auth::user()->nokp;
                $loan->id_pemohon = $formdata->pemohon_id;

                $loan->save();

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
    }

    public function upload_pengesahan(Request $request) {
        $file = $request->file('borang_pengesahan');
        $file_info = CommonController::base64_upload($file);
        $pemohon_id = $request->input('pemohon_id');

        $pemohon = Pemohon::find($pemohon_id);

        if(empty($pemohon->pengesahan_cuti)) {
            $uploadedFile = new File;
        } else {
            $uploadedFile = File::find($pemohon->pengesahan_cuti);
        }

        $uploadedFile->content_bytes = $file_info['base64'];
        $uploadedFile->ext = $file_info['ext'];
        $uploadedFile->filename = $file->getClientOriginalName();

        if($uploadedFile->save()) {
            $pemohon->pengesahan_cuti = $uploadedFile->id;
            $pemohon->save();

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

    public function submit_application(Request $request) {
        $alldata = $request->all();
        $formdata = json_decode($alldata['pemohon']);
        /*
        $maklumat['nama'] = $profile->nama;
                $maklumat['nokp_baru'] = $profile->nokp;
                $maklumat['nokp_lama'] = $profile->nokp_lama;
                $maklumat['jawatan'] = $khidmat->jawatan;
                $maklumat['kod_jawatan'] = $khidmat->kod_jawatan;
                $maklumat['gred'] = $khidmat->kod_gred;
                $maklumat['tkh_lantikan'] = $khidmat->tkh_lantik;
                $maklumat['tkh_sah'] = $khidmat->tkh_sah_perkhidmatan;
                $maklumat['umur_besara'] = $profile->pilihan_bersara_wajib;
                $maklumat['alamat_pejabat'] = $profile->alamat_pejabat;
                $maklumat['tel_pejabat'] = $profile->tel_pejabat;
                $maklumat['no_faks'] = $profile->fax_pejabat;
                $maklumat['no_hp'] = $profile->tel_bimbit;
                $maklumat['email'] = $profile->email;
                $maklumat['jantina'] = $profile->jantina;
                $maklumat['bangsa'] = $profile->bangsa;
                $maklumat['agama'] = $profile->agama;
                $maklumat['tkh_lahir'] = $profile->tkh_lahir;
                $maklumat['tmpt_lahir'] = $profile->negeri_lahir;
                $maklumat['gaji'] = empty($gaji) ? 0 : $gaji->gaji_pokok;
                $maklumat['alamat_rumah'] = $profile->alamat;
                $maklumat['gelaran'] =  $profile->gelaran;
                $maklumat['tkh_istihar'] = empty($tkh_istihar) ? 0 : $tkh_istihar;
                $maklumat['pasangan'] = empty($waris) ? '' : $waris->nama;
                $maklumat['alamat_pasangan'] = empty($waris) ? '' : $waris->tempat_kerja;
                $maklumat['pekerjaan_pasangan'] = empty($waris) ? '' : $waris->pekerjaan;
                $maklumat['cuti'] = $cuti;
                $maklumat['pengalaman'] = $pengalaman;
                $maklumat['akademik'] = $akademik;
                $maklumat['profesional'] = $profesional;
                $maklumat['kompeten'] = $kompeten;
                $maklumat['pengiktirafan'] = $iktiraf;
                $maklumat['pertubuhan'] = $pertubuhan;
                $maklumat['pemohon_id'] = $pemohon->id;
                $maklumat['peribadi_id'] = $profile->id;
                $maklumat['file_cuti'] = $pemohon->file ? $pemohon->file->filename : '';
                if($harta) {
                    $maklumat['file_harta'] = $harta->file ? $harta->file->filename : '';
                } else {
                    $maklumat['file_harta'] = '';
                }
                $maklumat['loan'] = $loan;
        */
        //pemohon
        $pemohon = Pemohon::find($formdata->pemohon_id);
        $pemohon->gaji_hakiki = $formdata->gaji;
        $pemohon->nokp_ketua_jabatan = $alldata['ketua_nokp'];
        // $pemohon->perakuan_ketua_jabatan
        // $pemohon->perakuan_ketua_jabatan_ulasan
        // $pemohon->perakuan_ketua_jabatan_jawatan
        // $pemohon->perakuan_ketua_jabatan_tkh
        // $pemohon->perakuan_ketua_jabatan_alamat_pejabat
        // $pemohon->pengesahan_perkhidmatan
        $pemohon->pengesahan_perkhidmatan_nokp = $alldata['kerani_nokp'];
        // $pemohon->pengesahan_perkhidmatan_jawatan
        // $pemohon->pengesahan_perkhidmatan_cawangan
        // $pemohon->pengesahan_perkhidmatan_tkh
        if($alldata['accept']) {
            $pemohon->status = Pemohon::WAITING_VERIFICATION;
        } else {
            $pemohon->status = Pemohon::REJECTED_APPLICATION;
        }
        $pemohon->alasan = $alldata['alasan'];
        $pemohon->updated_by = Auth::user()->nokp;
        $pemohon->jawatan = $formdata->jawatan;
        $pemohon->kod_jawatan = $formdata->kod_jawatan;
        $pemohon->gred = $formdata->gred;
        $pemohon->tkh_lantikan = $formdata->tkh_lantikan;
        $pemohon->tkh_sah_perkhidmatan = $formdata->tkh_sah;
        $pemohon->alamat_pejabat = $formdata->alamat_pejabat;
        $pemohon->save();

        $cuti_records = PermohonanCuti::where('id_pemohon',$formdata->pemohon_id)->get();
        if($cuti_records->count() == 0) {
            //cuti
            foreach($formdata->cuti as $cuti) {
                $rekoc_cuti =  new PermohonanCuti;
                $rekoc_cuti->jenis = $cuti->jenis_cuti;
                $rekoc_cuti->tkh_mula = $cuti->tkh_mula;
                $rekoc_cuti->tkh_akhir = $cuti->tkh_akhir;
                //$rekoc_cuti->surat_kelulusan
                $rekoc_cuti->id_pemohon = $formdata->pemohon_id;
                $rekoc_cuti->flag = 1;
                $rekoc_cuti->delete_id = 0;
                $rekoc_cuti->created_by = Auth::user()->nokp;
                $rekoc_cuti->updated_by = Auth::user()->nokp;

                $rekoc_cuti->save();
            }
        }


        // pengistiharan harta
        $harta = PermohonanHarta::where('id_pemohon',$formdata->pemohon_id)->first();
        if($harta) {
            $harta->tkh_akhir_pengisytiharan = $formdata->tkh_istihar;
            $harta->updated_by = Auth::user()->nokp;
            $harta->save();
        }

        $rekod_pasangan = Pasangan::where('id_pemohon',$formdata->pemohon_id)->first();
        if(empty($rekod_pasangan)) {
            $rekod_pasangan = new Pasangan;
        }
        // pasangan
        $rekod_pasangan->id_pemohon = $formdata->pemohon_id;
        $rekod_pasangan->hubungan = strtoupper($formdata->jantina) == 'L' ? 'ISTERI' : 'SUAMI';
        $rekod_pasangan->nama = $formdata->pasangan;
        $rekod_pasangan->pekerjaan = $formdata->pekerjaan_pasangan;
        $rekod_pasangan->alamat_pejabat = $formdata->alamat_pasangan;
        $rekod_pasangan->flag = 1;
        $rekod_pasangan->delete_id = 0;
        $rekod_pasangan->created_by = Auth::user()->nokp;
        $rekod_pasangan->updated_by = Auth::user()->nokp;
        $rekod_pasangan->save();

        // Perkhidmatan
        foreach($formdata->pengalaman as $pengalaman) {
            $rekod_khidmat = new Perkhidmatan;
            $rekod_khidmat->jawatan = $pengalaman->gelaran_jawatan ? $pengalaman->gelaran_jawatan->gelaran_jawatan : '';
            $rekod_khidmat->gred = $pengalaman->kod_gelaran_jawatan;
            $rekod_khidmat->penempatan = $pengalaman->tempat;
            $rekod_khidmat->tkh_mula_berkhidmat = $pengalaman->tkh_mula;
            $rekod_khidmat->tkh_akhir_berkhidmat = $pengalaman->tkh_tamat;
            $rekod_khidmat->flag = 1;
            $rekod_khidmat->delete_id = 0;
            $rekod_khidmat->created_by = Auth::user()->nokp;
            $rekod_khidmat->updated_by = Auth::user()->nokp;
            $rekod_khidmat->id_premohon = $formdata->pemohon_id;
            $rekod_khidmat->save();

        }

        //Akademik
        foreach($formdata->akademik as $academic) {
            $rekod_akademik = new Akademik;
            $rekod_akademik->nama_sijil = $academic->nama_kelulusan;
            $rekod_akademik->nama_insititusi = $academic->institusi;
            $rekod_akademik->id_pemohon = $formdata->pemohon_id;
            $rekod_akademik->flag = 1;
            $rekod_akademik->delete_id = 0;
            $rekod_akademik->created_by = Auth::user()->nokp;
            $rekod_akademik->updated_by = Auth::user()->nokp;
            $rekod_akademik->tkh_kelulusan = $academic->tkh_kelulusan;
            $rekod_akademik->save();
        }

        //Profesional
        foreach($formdata->profesional as $pro) {
            $rekod_professional = new Professional;
            $rekod_professional->nama_sijil = $pro->nama_kelulusan;
            $rekod_professional->badan_professional = $pro->institusi;
            $rekod_professional->no_pendaftaran = $pro->no_pendaftaran;
            $rekod_professional->id_pemohon = $formdata->pemohon_id;
            $rekod_professional->created_by = Auth::user()->nokp;
            $rekod_professional->updated_by = Auth::user()->nokp;
            $rekod_professional->flag = 1;
            $rekod_professional->delete_id = 0;
            $rekod_professional->tkh_kelulusan = $pro->tkh_kelulusan;
            $rekod_professional->save();
        }

        //Kompetensi
        foreach($formdata->kompeten as $komp) {
            $rekod_kompeten = new Kompetensi;
            $rekod_kompeten->nama_sijil = $komp->nama_kelulusan;
            $rekod_kompeten->tahap = $komp->tahap;
            $rekod_kompeten->id_pemohon = $formdata->pemohon_id;
            $rekod_kompeten->flag = 1;
            $rekod_kompeten->delete_id = 0;
            $rekod_kompeten->created_by = Auth::user()->nokp;
            $rekod_kompeten->updated_by = Auth::user()->nokp;
            $rekod_kompeten->save();
        }

        //pengiktirafan
        foreach($formdata->pengiktirafan as $iktiraf) {
            $rekod_iktiraf = new Pengiktirafan;
            $rekod_iktiraf->jenis = $iktiraf->jenis ? $iktiraf->jenis->peristiwa : '';
            $rekod_iktiraf->tkh_mula = $iktiraf->tkh_mula_peristiwa;
            $rekod_iktiraf->tkh_tamat =  $iktiraf->tkh_tamat_peristiwa;
            $rekod_iktiraf->flag = 1;
            $rekod_iktiraf->delete_id = 0;
            $rekod_iktiraf->id_pemohon = $formdata->pemohon_id;
            $rekod_iktiraf->created_by = Auth::user()->nokp;
            $rekod_iktiraf->updated_by = Auth::user()->nokp;
            $rekod_iktiraf->save();
        }

        $loan = PinjamanPendidikan::where('id_pemohon',$formdata->pemohon_id)->first();
        if(empty($loan)) {
            $loan = new PinjamanPendidikan;
            $loan->created_by = Auth::user()->nokp;
        }
        $loan->flag = 1;
                $loan->delete_id = 0;
                $loan->status = $alldata['status_pinjam'];
                $loan->nama_institusi = $alldata['nama_pinjam'];
                $loan->tkh_mula_pinjaman = empty($alldata['mula_pinjam']) ? NULL : Carbon::createFromFormat('d-m-Y', $alldata['mula_pinjam'])->format('Y-m-d');
                $loan->tkh_akhir_pinjaman = empty($alldata['akhir_pinjam']) ? NULL : Carbon::createFromFormat('d-m-Y', $alldata['akhir_pinjam'])->format('Y-m-d');
                $loan->tkh_mula_bayaran = empty($alldata['bayar_pinjam']) ? NULL : Carbon::createFromFormat('d-m-Y', $alldata['bayar_pinjam'])->format('Y-m-d');
                $loan->tkh_selesai_bayaran = empty($alldata['selesai_pinjam']) ? NULL : Carbon::createFromFormat('d-m-Y', $alldata['selesai_pinjam'])->format('Y-m-d');
                $loan->jumlah_pinjaman = $alldata['jumlah_pinjam'];

                $loan->updated_by = Auth::user()->nokp;
                $loan->id_pemohon = $formdata->pemohon_id;
        $loan->save();

        $pengakuan = new PengakuanPemohon;
        $pengakuan->tatatertib = $alldata['tatatertib'];
        $pengakuan->isytihar_harta = 1;
        $pengakuan->cuti_tanpa_gaji = $alldata['cuti'];
        $pengakuan->perakuan = $alldata['akuan'];
        $pengakuan->tempoh_percubaan_denda = $alldata['denda'];
        $pengakuan->perakuan_tkh = Date::now();
        $pengakuan->id_pemohon = $formdata->pemohon_id;
        $pengakuan->flag = 0;
        $pengakuan->delete_id = 0;
        $pengakuan->created_by = Auth::user()->nokp;
        $pengakuan->updated_by = Auth::user()->nokp;
        $pengakuan->save();

        //send email

        return response()->json([
            'success' => 1,
            'data' => []
        ]);

    }

    public function download_form_part(Request $request) {
        $formdata = json_decode($request->input('dataform'));
        return Ukp12Pdf::print($formdata);
    }

    public function load_view(Request $request,$id) {
        $pemohon = Pemohon::find($id);
        $peribadi = Peribadi::find($pemohon->id_peribadi);
        $cuti = PermohonanCuti::where('id_pemohon',$pemohon->id)->get();
        $harta = PermohonanHarta::where('id_pemohon',$pemohon->id)->first();
        $pasangan = Pasangan::where('id_pemohon',$pemohon->id)->first();
        $perkhidmatan = Perkhidmatan::where('id_pemohon',$pemohon->id)->get();
        $pertubuhan = Pertubuhan::where('pemohon_id',$pemohon->id)->get();
        $akademik = Akademik::where('id_pemohon',$pemohon->id)->get();
        $profesional = Professional::where('id_pemohon',$pemohon->id)->get();
        $kompetenan = Kompetensi::where('id_pemohon',$pemohon->id)->get();
        $pengiktirafan= Pengiktirafan::where('id_pemohon',$pemohon->id)->get();
        $akuan_pinjaman = PinjamanPendidikan::where('id_pemohon',$pemohon->id)->first();
        $akuan_pegawai = PengakuanPemohon::where('id_pemohon',$pemohon->id)->first();

        return view('form.view.view_ukp12',[
            'pemohon' => $pemohon,
            'peribadi' => $peribadi,
            'cutis' => $cuti,
            'harta' => $harta,
            'pasangan' => $pasangan,
            'perkhidmatans' => $perkhidmatan,
            'pertubuhans' => $pertubuhan,
            'akademiks' => $akademik,
            'profesionals' => $profesional,
            'kompetenans' => $kompetenan,
            'pengiktirafans' => $pengiktirafan,
            'akuan_pinjaman' => $akuan_pinjaman,
            'akuan_pegawai' => $akuan_pegawai
        ]);
    }

    private function verify_applicant($nokp,$formId) {
        // check applicant is eligible
        $eligible = false;
        /*
        select c.nokp, k."name", k.permohonan_id  from calon c
join kumpulan k on c.kumpulan_id = k.id
where c.nokp = '830801025623' and k.permohonan_id = 8;
        */

        $calon = DB::connection('pgsql')->table('calon as c')
            ->join('kumpulan as k','c.kumpulan_id','k.id')
            ->select('c.nokp', 'k.name', 'k.permohonan_id')
            ->where('c.nokp', $nokp)->where('k.permohonan_id',8)
            ->first();

        if($calon) {
            $eligible = true;
        }

        return $eligible;

    }

    private function load_info($profile,$nokp,$pemohon) {
        $khidmat = DB::connection('pgsqlmykj')->table('perkhidmatan as p')
        ->join('l_jawatan as j', 'j.kod_jawatan','p.kod_jawatan')
        ->select('p.kod_gred','p.kod_jawatan','j.jawatan', 'p.tkh_lantik', 'p.tkh_sah_perkhidmatan')
        ->where('nokp',$nokp)->where('flag',1)->first();


        $gaji = Gaji::where('nokp',$nokp)->where('flag',1)->first();
        //$agama = LAgama::all();
        //$bangsa = LBangsa::all();
        $tkh_istihar = Harta::where('nokp',$nokp)->max('tkh_istihar');
        $waris = Waris::where('nokp',$nokp)->where('kod_perhubungan', strtoupper($profile->jantina) == 'L' ? 4 : 3)->first();
        $cuti = Cuti::where('nokp',$nokp)->whereIn('jenis_cuti', array('CUTI TANPA GAJI',
        'CUTI SEPARUH GAJI',
        'CUTI BELAJAR BERGAJI',
        'CUTI BELAJAR SEPARUH GAJI',
        'CUTI BELAJAR TANPA GAJI'))->get();
        $pengalaman = Pengalaman::where('nokp',$nokp)->orderBy('tkh_mula', 'desc')->get();

        // $pengalaman->each(function ($item, $key) {

        // });

        $akademik = Kelayakan::where('nokp',$nokp)->whereNotIn('kod_kelulusan',[8,9,10,21,22,23])->get();
        $profesional = Kelayakan::where('nokp',$nokp)->where('kod_kelulusan',8)->get();
        $kompeten = Kelayakan::where('nokp',$nokp)->whereIn('kod_kelulusan',[9,10])->get();

        $iktiraf = Peristiwa::where('nokp',$nokp)->wherein('kod_peristiwa',['P8','A1','P10','A4'])->get();

        $pertubuhan = Pertubuhan::where('pemohon_id',$pemohon->id)->get();
        $harta = PermohonanHarta::where('id_pemohon',$pemohon->id)->first();
        $loan = PinjamanPendidikan::where('id_pemohon',$pemohon->id)->first();

        $maklumat = array();
                $maklumat['nama'] = $profile->nama;
                $maklumat['nokp_baru'] = $profile->nokp;
                $maklumat['nokp_lama'] = $profile->nokp_lama;
                $maklumat['jawatan'] = $khidmat->jawatan;
                $maklumat['kod_jawatan'] = $khidmat->kod_jawatan;
                $maklumat['gred'] = $khidmat->kod_gred;
                $maklumat['tkh_lantikan'] = $khidmat->tkh_lantik;
                $maklumat['tkh_sah'] = $khidmat->tkh_sah_perkhidmatan;
                $maklumat['umur_besara'] = $profile->pilihan_bersara_wajib;
                $maklumat['alamat_pejabat'] = $profile->alamat_pejabat;
                $maklumat['tel_pejabat'] = $profile->tel_pejabat;
                $maklumat['no_faks'] = $profile->fax_pejabat;
                $maklumat['no_hp'] = $profile->tel_bimbit;
                $maklumat['email'] = $profile->email;
                $maklumat['jantina'] = $profile->jantina;
                $maklumat['bangsa'] = $profile->bangsa;
                $maklumat['agama'] = $profile->agama;
                $maklumat['tkh_lahir'] = $profile->tkh_lahir;
                $maklumat['tmpt_lahir'] = $profile->negeri_lahir;
                $maklumat['taraf_perkahwinan'] = $profile->taraf_perkahwinan;
                $maklumat['gaji'] = empty($gaji) ? 0 : $gaji->gaji_pokok;
                $maklumat['alamat_rumah'] = $profile->alamat;
                $maklumat['gelaran'] =  $profile->gelaran;
                $maklumat['tkh_istihar'] = empty($tkh_istihar) ? 0 : $tkh_istihar;
                $maklumat['pasangan'] = empty($waris) ? '' : $waris->nama;
                $maklumat['alamat_pasangan'] = empty($waris) ? '' : $waris->tempat_kerja;
                $maklumat['pekerjaan_pasangan'] = empty($waris) ? '' : $waris->pekerjaan;
                $maklumat['cuti'] = $cuti;
                $maklumat['pengalaman'] = $pengalaman;
                $maklumat['akademik'] = $akademik;
                $maklumat['profesional'] = $profesional;
                $maklumat['kompeten'] = $kompeten;
                $maklumat['pengiktirafan'] = $iktiraf;
                $maklumat['pertubuhan'] = $pertubuhan;
                $maklumat['pemohon_id'] = $pemohon->id;
                $maklumat['peribadi_id'] = $profile->id;
                $maklumat['file_cuti'] = $pemohon->file ? $pemohon->file->filename : '';
                if($harta) {
                    $maklumat['file_harta'] = $harta->file ? $harta->file->filename : '';
                } else {
                    $maklumat['file_harta'] = '';
                }
                $maklumat['loan'] = $loan;
                $maklumat['gred_memangku'] = $pemohon->pemohonPermohonan ? $pemohon->pemohonPermohonan->gred : '';



        $pemohon->jawatan =$maklumat['jawatan'] ;
        $pemohon->kod_jawatan = $maklumat['kod_jawatan'];
        $pemohon->gred = $maklumat['gred'];
        $pemohon->tkh_lantikan = $maklumat['tkh_lantikan'];
        $pemohon->tkh_sah_perkhidmatan = $maklumat['tkh_sah'];
        $pemohon->alamat_pejabat = $maklumat['alamat_pejabat'];

        $pemohon->save();

        return $maklumat;
    }

    private function search_jawatan($nokp,$year) {
        $result = DB::connection('pgsqlmykj')->table('perkhidmatan as p')
                    ->leftJoin('l_gelaran_jawatan as g','p.kod_gelaran_jawatan','g.kod_gelaran_jawatan')
                    ->select('p.gelaran_jawatan')
                    ->where(DB::raw(''))->get();
    }
}
