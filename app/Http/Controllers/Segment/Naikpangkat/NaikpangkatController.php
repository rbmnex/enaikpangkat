<?php

namespace App\Http\Controllers\Segment\Naikpangkat;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Form\UkpController;
use App\Models\Permohonan\Akademik;
use App\Models\Permohonan\Cuti as PermohonanCuti;
use App\Models\Permohonan\Harta as PermohonanHarta;
use App\Models\Permohonan\Kompetensi;
use App\Models\Permohonan\Pasangan;
use App\Models\Permohonan\Pemohon;
use App\Models\Permohonan\PengakuanPemohon;
use App\Models\Permohonan\Pengiktirafan;
use App\Models\Permohonan\Perkhidmatan;
use App\Models\Permohonan\PermohonanUkp12;
use App\Models\Permohonan\PinjamanPendidikan;
use App\Models\Permohonan\Professional;
use App\Models\Permohonan\Sumbangan;
use App\Models\Profail\Peribadi;
use App\Models\User;
use App\Pdf\Ukp13Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\DataTables;

class NaikpangkatController extends Controller
{
    public function index(){
        return view('segment.naikpangkat.main.index');
    }

    public function getUkp13List(){
        $model = PermohonanUkp12::select('permohonan_ukp12.*')->where('permohonan_ukp12.jenis', 'UKP13')->join('pemohon', 'pemohon.id_permohonan', '=', 'permohonan_ukp12.id')->where('pemohon.user_id', Auth::user()->id)->get();


        return DataTables::of($model)
            ->setRowAttr([
                'data-ukp12-id' => function($data) {
                    return $data->id;
                },
            ])
            ->addColumn('nokp', function($data){
                $user = Auth::user()->nokp;
                return $user;
            })
            ->addColumn('nama', function($data){
                $user = Auth::user()->name;
                return $user;
            })
            ->addColumn('status', function($data){
                $status = Pemohon::select('status')->where('id_permohonan', $data->id)->first();
                return $status->status;
            })
            ->addColumn('action', function($data){
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function borang($id_pemohonan){
        $ukpC = new UkpController;

        $model = Pemohon::where('id_permohonan', $id_pemohonan)->first();

        if($model->id_peribadi == null){
            $peribadi = Peribadi::recreate(Auth::user()->id,Auth::user()->nokp);
            $model->id_peribadi = $peribadi->id;
            $model->save();
        }else{
            $peribadi = Peribadi::find($model->id_peribadi);
        }

        $maklumat = $ukpC->load_info($peribadi, Auth::user()->nokp,$model);

        return view('segment.naikpangkat.borang.index', [
            "profile" => $maklumat,
            "pemohon_id" => $model->id
        ]);
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
        $pemohon->nokp_penyelia = $alldata['penyelia_nokp'];
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
            $rekod_khidmat->gred = $pengalaman->kod_gelaran_jawatan ?? null;
            $rekod_khidmat->penempatan = $pengalaman->tempat;
            $rekod_khidmat->tkh_mula_berkhidmat = $pengalaman->tkh_mula;
            $rekod_khidmat->tkh_akhir_berkhidmat = $pengalaman->tkh_tamat;
            $rekod_khidmat->flag = 1;
            $rekod_khidmat->delete_id = 0;
            $rekod_khidmat->created_by = Auth::user()->nokp;
            $rekod_khidmat->updated_by = Auth::user()->nokp;
            $rekod_khidmat->id_pemohon = $formdata->pemohon_id;
            $rekod_khidmat->save();

        }

        //sumbangan
        foreach($formdata->sumbangan as $contribute) {
            $rekod_sumbangan = new Sumbangan();
            $rekod_sumbangan->sumbangan = $contribute->nama_kelulusan;
            $rekod_sumbangan->tkh_peristiwa = $contribute->tkh_kelulusan;
            $rekod_sumbangan->pemohon_id = $formdata->pemohon_id;
            $rekod_sumbangan->created_by =  Auth::user()->nokp;
            $rekod_sumbangan->updated_by =   Auth::user()->nokp;
            $rekod_sumbangan->flag = 1;
            $rekod_sumbangan->delete_id = 0;
            $rekod_sumbangan->tempat =  $contribute->institusi;
            $rekod_sumbangan->save();
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
            $rekod_professional->no_pendaftaran = $pro->no_pendaftaran ?? null;
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

        if($pemohon->status == Pemohon::WAITING_VERIFICATION) {
            $kerani_user = User::addOrUpdate($alldata['kerani_nokp']);
            if(!$kerani_user->hasRole('clerk')) {
                $kerani_user->attachRole('clerk');
            }

            //send email
            $secure_link = Crypt::encryptString($pemohon->id);

            $content = [
                'link' => url('/')."/form/ukp12/eview/".$secure_link,
                'gred' => $pemohon->gred,
                'jawatan' => $pemohon->jawatan,
                'nokp' => $formdata->nokp_baru,
                'nama' => $formdata->nama
            ];
            Mail::mailer('smtp')->send('mail.pengesahan-mail',$content,function($message) use ($kerani_user) {
                // testing purpose
                //$message->to('rubmin@vn.net.my',$kerani_user->name);

                $message->to($kerani_user->email,$kerani_user->name);
                $message->subject('PENGESAHAN PERKHIDMATAN PEGAWAI UNTUK URUSAN NAIK PANGKAT');

            });

            $ketua_user = User::addOrUpdate($alldata['ketua_nokp']);
            if(!$ketua_user->hasRole('hod')) {
                $ketua_user->attachRole('hod');
            }

            $penyelia_user = User::addOrUpdate($alldata['penyelia_nokp']);
            if(!$penyelia_user->hasRole('supervisor')) {
                $penyelia_user->attachRole('supervisor');
            }

            Mail::mailer('smtp')->send('mail.pengesahan-mail',$content,function($message) use ($penyelia_user) {
                // testing purpose
                //$message->to('rubmin@vn.net.my',$penyelia_user->name);

                $message->to($penyelia_user->email,$penyelia_user->name);
                $message->subject('PENGESAHAN PERKHIDMATAN PENYELIA UNTUK URUSAN NAIK PANGKAT');

            });
        } else {
            $content = [
                'gred' => $pemohon->gred,
                'jawatan' => $pemohon->jawatan,
                'nokp' => $formdata->nokp_baru,
                'nama' => $formdata->nama,
                'reason' => $pemohon->alasan,
                'naik_gred' => $pemohon->pemohonPermohonan->gred,
                'alamat' => $pemohon->alamat_pejabat,
                'tarikh' => \Carbon\Carbon::parse(Date::now())->format('d-m-Y')
            ];

            Mail::mailer('smtp')->send('mail.tolak_tawaran-mail',$content,function($message) use ($formdata){
                // testing purpose
                $message->to('enaikpangkat@jkr.gov.my','Urus Setia Kenaik Pangkat');
                //$message->from($formdata->email,$formdata->nama);

                //$message->to($kerani_user->email,'Urus Setia Kenaik Pangkat');
                $message->subject('MENOLAK TAWARAN PEMANGKUAN');

            });
        }

        return response()->json([
            'success' => 1,
            'data' => []
        ]);
    }

    public function download_form_part(Request $request) {
        $ukpC = new UkpController;
        $formdata = $request->input('dataform');
        $pemohon = Pemohon::find($formdata);

        if(!$pemohon){
            $pemohon = Pemohon::where('id_permohonan', $formdata)->first();
        }

        $profile = $pemohon->pemohonPeribadi;
        $maklumat = json_encode($ukpC->load_info($profile,$profile->nokp,$pemohon));
        return Ukp13Pdf::print(json_decode($maklumat));
    }
}
