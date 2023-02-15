<?php

namespace App\Http\Controllers\Segment\Naikpangkat;

use App\Http\Controllers\Common\CommonController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Form\UkpController;
use App\Models\File;
use App\Models\Lpnk\Lnpk;
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

    public function mohon(Request $request,$encrypted) {
        $id = Crypt::decryptString($encrypted);
        return $this->apply($request,$id);
    }

    public function apply(Request $request,$id) {

        $ukpC = new UkpController();
        $pemohon = Pemohon::find($id);
        $pemohon->status = Pemohon::NOT_SUBMITTED;
        $user = User::find($pemohon->user_id);
        if($pemohon) {
            $profile = Peribadi::find($pemohon->id_peribadi);
            if(empty($profile)) {
                $profile = Peribadi::recreate($user->id,$user->nokp);
            }
            $maklumat = $ukpC->load_info($profile,$profile->nokp,$pemohon);
            $request->session()->put('naikpangkat-'.$id,json_encode($maklumat));
            return view('segment.naikpangkat.borang.index',[
                "profile" => $maklumat,
                "pemohon_id" =>$pemohon->id
            ]);
        } else {
            return view('form.message',['message' => 'Anda Tidak Layak Untuk Mengambil Permohonan Ini!']);
        }
    }

    public function upload_file(Request $request) {
        $file = $request->file('upload_file');
        $id = $request->file('id_pemohon');
        $formdata = json_decode($request->session()->get('naikpangkat-'.$id));
        $filename = $file->getClientOriginalName();

        $type = $request->file('type');
        if($type == 'harta') {
            $model = PermohonanHarta::where('id_pemohon',$formdata->pemohon_id)->first();
            if(empty($model)) {
                $model = new PermohonanHarta();
                $model->created_by = Auth::user()->nokp;
                $model->flag = 1;
                $model->delete_id = 0;
                $model->id_pemohon = $formdata->pemohon_id;
            }
            $model->tkh_akhir_pengisytiharan = $formdata->tkh_istihar;
            $model->surat_kelulusan_id = empty($model) ? $this->load_file_model(0,$file) : $this->load_file_model($model->surat_kelulusan_id,$file);
        } else if($type == 'pinjaman_pendidikan') {
            $status = $request->input('status');
            $nama_institusi = $request->input('nama');
            $tkh_mula_pinjaman = $request->input('mula');
            $tkh_akhir_pinjaman = $request->input('akhir');
            $tkh_mula_bayaran = $request->input('bayar');
            $jumlah_pinjaman = $request->input('jumlah');
            $tkh_selesai_bayaran = $request->input('selesai');
            $model = PinjamanPendidikan::where('id_pemohon',$id)->where('flag',1)->where('delete_id',0)->first();
            if(empty($model)) {
                $model = new PinjamanPendidikan();
                $model->created_by = Auth::user()->nokp;
                $model->flag = 1;
                $model->delete_id = 0;
            }
            $model->status = $status;
            $model->nama_institusi = $nama_institusi;
            $model->tkh_mula_pinjaman = empty($tkh_mula_pinjaman) ? NULL : Carbon::createFromFormat('d-m-Y', $tkh_mula_pinjaman)->format('Y-m-d');
            $model->tkh_akhir_pinjaman = empty($tkh_akhir_pinjaman) ? NULL : Carbon::createFromFormat('d-m-Y', $tkh_akhir_pinjaman)->format('Y-m-d');
            $model->tkh_mula_bayaran = empty($tkh_mula_bayaran) ? NULL : Carbon::createFromFormat('d-m-Y', $tkh_mula_bayaran)->format('Y-m-d');
            $model->tkh_selesai_bayaran = empty($tkh_selesai_bayaran) ? NULL : Carbon::createFromFormat('d-m-Y', $tkh_selesai_bayaran)->format('Y-m-d');
            $model->jumlah_pinjaman = $jumlah_pinjaman;
            $model->surat_perakuan = empty($model) ? $this->load_file_model(0,$file) : $this->load_file_model($model->surat_perakuan,$file);
            $model->id_pemohon = $id;
        } else if($type == 'cuti') {
            $model = Pemohon::find($id);
            if(empty($model->pengesahan_cuti)) {
                $model->pengesahan_cuti = $this->load_file_model(0,$file);
            } else {
                $model->pengesahan_cuti = $this->load_file_model($model->pengesahan_cuti,$file);
            }
        } else if($type == 'form') {
            $model = Pemohon::find($id);
            if(empty($model->form_file)) {
                $model->form_file = $this->load_file_model(0,$file);
            } else {
                $model->form_file = $this->load_file_model($model->form_file,$file);
            }
        } else if($type == 'work') {
            $model = Lnpk::where('id_pemohon',$id)->first();
            if(empty($model)) {
                $model = new Lnpk();
                $model->created_by = Auth::user()->nokp;
                $model->flag = 1;
                $model->delete_id = 0;
            }
            $model->id_pemohon = $id;
            $model->fail_skt = empty($model) ? $this->load_file_model(0,$file) : $this->load_file_model($model->fail_skt,$file);
        }

        $model->updated_by = Auth::user()->nokp;
        if($model->save()) {
            return response()->json([
                'success' => 1,
                'data' => [
                    'name' => $filename
                ]
            ]);
        } else {
            return response()->json([
                'success' => 0,
                'data' => [
                    'name' => $filename
                ]
            ]);
        }
    }

    private function load_file_model($id,$file) {
        $base64Content = base64_encode(file_get_contents($file));
        $extension = $file->getClientOriginalExtension();
        $filename = $file->getClientOriginalName();

        if($id == 0 || empty($id)) {
            $uploadedFile = new File();
        } else {
            $uploadedFile = File::find($id);
        }

        $uploadedFile->content_bytes = $base64Content;
        $uploadedFile->ext = $extension;
        $uploadedFile->filename = $filename;

        if($uploadedFile->save()) {
            return $uploadedFile->id;
        } else {
            return null;
        }
    }

    private function save_form($formdata) {
        PermohonanCuti::where('id_pemohon',$formdata->pemohon_id)->delete();
        $cuti_records = PermohonanCuti::where('id_pemohon',$formdata->pemohon_id)->get();
        $common = new CommonController;
        if($cuti_records->count() == 0) {
            //cuti
            foreach($formdata->cuti as $cuti) {
                $rekoc_cuti =  new PermohonanCuti;
                $rekoc_cuti->jenis = $cuti->jenis_cuti;
                $rekoc_cuti->tkh_mula = $cuti->tkh_mula;
                $rekoc_cuti->tkh_akhir = $cuti->tkh_tamat;
                //$rekoc_cuti->surat_kelulusan
                $rekoc_cuti->id_pemohon = $formdata->pemohon_id;
                $rekoc_cuti->flag = 1;
                $rekoc_cuti->delete_id = 0;
                $rekoc_cuti->created_by = Auth::user()->nokp;
                $rekoc_cuti->updated_by = Auth::user()->nokp;

                if($cuti->item_fm) {
                    $urlPath = env('MYKJ_FILE_LINK','https://mykj.jkr.gov.my/').'upload_cuti/'.$formdata->nokp_baru.'/'.$cuti->item_fm;
                    $file_info = $common->file_info_url($urlPath);
                    if(!empty($file_info)) {
                        $newFile = new File();
                        $newFile->content_bytes = $file_info['content'];
                        $newFile->ext = $file_info['extension'];
                        $newFile->filename = $file_info['filename'];
                        if($newFile->save()) {
                            $rekoc_cuti->surat_kelulusan = $newFile->id;
                        }
                    }
                }

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
        Perkhidmatan::where('id_pemohon',$formdata->pemohon_id)->delete();
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
            $rekod_khidmat->id_pemohon = $formdata->pemohon_id;
            $rekod_khidmat->save();

        }

        //sumbangan
        Sumbangan::where('pemohon_id',$formdata->pemohon_id)->delete();
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
        Akademik::where('id_pemohon',$formdata->pemohon_id)->delete();
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
        Professional::where('id_pemohon',$formdata->pemohon_id)->delete();
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

            if($pro->item_fm) {
                $urlPath = env('MYKJ_FILE_LINK','https://mykj.jkr.gov.my/').'upload_kelayakan/'.$formdata->nokp_baru.'/'.$pro->item_fm;
                $file_info = $common->file_info_url($urlPath);
                if(!empty($file_info)) {
                    $newFile = new File();
                    $newFile->content_bytes = $file_info['content'];
                    $newFile->ext = $file_info['extension'];
                    $newFile->filename = $file_info['filename'];
                    if($newFile->save()) {
                        $rekod_professional->file_id = $newFile->id;
                    }
                }
            }

            $rekod_professional->save();


        }

        //Kompetensi
        Kompetensi::where('id_pemohon',$formdata->pemohon_id)->delete();
        foreach($formdata->kompeten as $komp) {
            $rekod_kompeten = new Kompetensi;
            $rekod_kompeten->nama_sijil = $komp->nama_kelulusan;
            $rekod_kompeten->tahap = $komp->tahap;
            $rekod_kompeten->id_pemohon = $formdata->pemohon_id;
            $rekod_kompeten->flag = 1;
            $rekod_kompeten->delete_id = 0;
            $rekod_kompeten->created_by = Auth::user()->nokp;
            $rekod_kompeten->updated_by = Auth::user()->nokp;
            if($komp->item_fm) {
                $urlPath = env('MYKJ_FILE_LINK','https://mykj.jkr.gov.my/').'upload_kelayakan/'.$formdata->nokp_baru.'/'.$komp->item_fm;
                $file_info = $common->file_info_url($urlPath);
                if(!empty($file_info)) {
                    $newFile = new File();
                    $newFile->content_bytes = $file_info['content'];
                    $newFile->ext = $file_info['extension'];
                    $newFile->filename = $file_info['filename'];
                    if($newFile->save()) {
                        $rekod_kompeten->fail = $newFile->id;
                    }
                }
            }
            $rekod_kompeten->save();
        }

        //pengiktirafan
        Pengiktirafan::where('id_pemohon',$formdata->pemohon_id)->delete();
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
    }

    public function submit_normal(Request $request) {
        $alldata = $request->all();
        $formdata = json_decode($request->session()->get('naikpangkat-'.$alldata['id_pemohon']));
        $pemohon = Pemohon::find($formdata->pemohon_id);
        $pemohon->gaji_hakiki = $formdata->gaji;
        $pemohon->nokp_ketua_jabatan = $alldata['ketua_nokp'];
        $pemohon->pengesahan_perkhidmatan_nokp = $alldata['kerani_nokp'];
        if(isset($alldata['accept'])) {
            if($alldata['accept']) {
                $pemohon->status = Pemohon::WAITING_VERIFICATION;
            } else {
                $pemohon->status = Pemohon::REJECTED_APPLICATION;
            }
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

        $this->save_form($formdata);

        $pengakuan = PengakuanPemohon::where('id_pemohon',$formdata->pemohon_id)->first();
        if(empty($pengakuan)) {
            $pengakuan = new PengakuanPemohon;
        }
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

        $lnpk = Lnpk::where('id_pemohon',$formdata->pemohon_id)->first();
        $lnpk->nokp_penilai = $alldata['penyelia_nokp'];


        if(isset($alldata['kerani_nokp'])) {
            $kerani_user = User::addOrUpdate($alldata['kerani_nokp']);
            if(!$kerani_user->hasRole('clerk')) {
                $kerani_user->attachRole('clerk');
            }
        }

        if(isset($alldata['ketua_nokp'])) {
            $ketua_user = User::addOrUpdate($alldata['ketua_nokp']);
            if(!$ketua_user->hasRole('hod')) {
                $ketua_user->attachRole('hod');
            }
        }

        if($pemohon->status == Pemohon::WAITING_VERIFICATION) {
            //send email
            $secure_link = Crypt::encryptString($pemohon->id);

                    $content = [
                        'link' => url('/')."/form/ukp12/eview/".$secure_link."?view=s",
                        'gred' => $pemohon->gred,
                        'jawatan' => $pemohon->jawatan,
                        'nokp' => $formdata->nokp_baru,
                        'nama' => $formdata->nama
                    ];
                    try {

                        Mail::mailer('smtp')->send('mail.pengesahan-mail',$content,function($message) use ($kerani_user) {
                            // testing purpose
                            //$message->to('rubmin@vn.net.my',$kerani_user->name);

                            //$message->to('munirahj@jkr.gov.my',$kerani_user->name);
                            $message->to($kerani_user->email,$kerani_user->name);
                            $message->subject('PENGESAHAN PERKHIDMATAN PEGAWAI UNTUK URUSAN PEMANGKUAN');

                        });
                    } catch(\Exception $e) {
                        var_dump($e->getMessage());
                        return response()->json([
                            'success' => 0,
                            'data' => [
                                'message' => 'Failed to email (email pengesahan ketua perkhidmatan)',
                                'error' => $e->getMessage()
                            ]
                        ]);
                    }
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

            try {
                Mail::mailer('smtp')->send('mail.tolak_tawaran-mail',$content,function($message) use ($formdata){
                    // testing purpose
                    //$message->to('rubmin@vn.net.my','Urusetia e-NaikPangkat');
                    $message->to('urusetiakenaikanpangkat@jkr@.gov.my','Urus Setia Kenaik Pangkat');


                    //$message->to($kerani_user->email,'Urus Setia Kenaik Pangkat');
                    $message->subject('MENOLAK TAWARAN PEMANGKUAN');

                });

            } catch(\Exception $e) {
                var_dump($e->getMessage());
                return response()->json([
                    'success' => 0,
                    'data' => [
                        'message' => 'Failed to email (email calon tolak)',
                        'error' => $e->getMessage()
                    ]
                ]);
            }
        }

        return response()->json([
            'success' => 1,
            'data' => []
        ]);

    }



}
