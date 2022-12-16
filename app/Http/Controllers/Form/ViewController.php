<?php

namespace App\Http\Controllers\Form;

use App\Http\Controllers\Controller;
use App\Models\Mykj\ListPegawai2;
use App\Models\Mykj\Markah;
use App\Models\Permohonan\Akademik;
use App\Models\Permohonan\Cuti;
use App\Models\Permohonan\Harta;
use App\Models\Permohonan\Kompetensi;
use App\Models\Permohonan\Pasangan;
use App\Models\Permohonan\Pemohon;
use App\Models\Permohonan\PengakuanPemohon;
use App\Models\Permohonan\Pengiktirafan;
use App\Models\Permohonan\Perkhidmatan;
use App\Models\Permohonan\Pertubuhan;
use App\Models\Permohonan\PinjamanPendidikan;
use App\Models\Permohonan\Professional;
use App\Models\Permohonan\Sumbangan;
use App\Models\Profail\Peribadi;
use App\Models\Urussetia\LnptUkp12;
use App\Models\Urussetia\TatatertibUkp12;
use App\Models\User;
use App\Pdf\PdfRender;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Mail;
use Laratrust\LaratrustFacade as Laratrust;
//use Barryvdh\DomPDF\Facade\Pdf;
use PDF;
use stdClass;

class ViewController extends Controller
{
    public const HOD_FORM = 'form.view.include.ketua-form';
    public const HOD_VIEW = 'form.view.include.ketua-view';
    public const HOS_FORM = 'form.view.include.khidmat-form';
    public const HOS_VIEW = 'form.view.include.khidmat-view';
    public const LNPK_FORM = 'form.view.include.lnpk-form';
    public const LNPK_VIEW = 'form.view.include.lnpk-view';
    public const KADER_VIEW = 'form.view.include.kader-section';

    public function __construct() {
        $this->middleware('auth');
    }
    //
    public function secure_view(Request $request,$encrypted) {
        $id = Crypt::decryptString($encrypted);
        return $this->view_form($request,$id);
    }

    public function view_form(Request $request, $id) {
            $view = $request->input('view');
            $year = Carbon::parse(Date::now())->format('Y');
            $pemohon = Pemohon::find($id);
            $peribadi = Peribadi::find($pemohon->id_peribadi);
            $cuti = Cuti::where('id_pemohon',$pemohon->id)->get();
            $harta = Harta::where('id_pemohon',$pemohon->id)->first();
            $pasangan = Pasangan::where('id_pemohon',$pemohon->id)->first();
            $perkhidmatan = Perkhidmatan::where('id_pemohon',$pemohon->id)->get();
            $pertubuhan = Pertubuhan::where('pemohon_id',$pemohon->id)->get();
            $akademik = Akademik::where('id_pemohon',$pemohon->id)->get();
            $profesional = Professional::where('id_pemohon',$pemohon->id)->get();
            $kompetenan = Kompetensi::where('id_pemohon',$pemohon->id)->get();
            $pengiktirafan= Pengiktirafan::where('id_pemohon',$pemohon->id)->get();
            $akuan_pinjaman = PinjamanPendidikan::where('id_pemohon',$pemohon->id)->first();
            $akuan_pegawai = PengakuanPemohon::where('id_pemohon',$pemohon->id)->first();
            $lnpt = Markah::where('nokp',$peribadi->nokp)->whereIn('tahun',[$year-1,$year-2,$year-3])->orderBy('tahun','desc')->limit(3)->get();
            $clerk = NULL;
            if(!empty($pemohon->pengesahan_perkhidmatan_nokp))
            $clerk = ListPegawai2::getMaklumatPegawai($pemohon->pengesahan_perkhidmatan_nokp);
            $hod = NULL;
            if(!empty($pemohon->nokp_ketua_jabatan))
            $hod = ListPegawai2::getMaklumatPegawai($pemohon->nokp_ketua_jabatan);
            $tatatertib = TatatertibUkp12::where('id_pemohon',$pemohon->id)->first();
            $contribution = Sumbangan::where('pemohon_id',$pemohon->id)->get();

            $rekod_markah =  LnptUkp12::where('id_pemohon',$pemohon->id)->get();
            $markah =  collect([]);

            if($rekod_markah->count() == 0) {
                $first = new stdClass;
                $first->tahun = $year-1;
                $first->purata = 0;
                    $markah->push($first);
                $second = new stdClass;
                $second->tahun = $year-2;
                $second->purata = 0;
                    $markah->push($second);
                $third = new stdClass;
                $third->tahun = $year-3;
                $third->purata = 0;
                    $markah->push($third);
                if(!empty($lnpt)) {
                    $markah->each(function ($item, $key) use ($lnpt) {
                        foreach($lnpt as $l) {
                            if($l->tahun == $item->tahun) {
                                $item->purata = $l->purata;
                            }
                        }
                    });
                }
            } else {
                $markah = $rekod_markah;
                $markah->each(function ($item, $key) {
                    $item->purata = $item->markah;
                });
            }

            $includes = array();
            if($view == 'n') {
                if($pemohon->jenis_penempatan != 2) {
                    array_push($includes, ViewController::LNPK_VIEW);
                    array_push($includes, ViewController::HOS_VIEW);
                    array_push($includes, ViewController::HOD_VIEW);
                    array_push($includes, 'form.view.include.ukp12-dowload');
                } else {
                    array_push($includes, ViewController::LNPK_VIEW);
                    array_push($includes, ViewController::KADER_VIEW);
                }

            } else if($view == 'k') {
                if($pemohon->jenis_penempatan == 2) {
                    array_push($includes, ViewController::LNPK_VIEW);
                    array_push($includes, ViewController::KADER_VIEW);
                } else {
                    array_push($includes, ViewController::LNPK_VIEW);
                    array_push($includes, ViewController::HOS_VIEW);
                    array_push($includes, ViewController::HOD_VIEW);
                    array_push($includes, 'form.view.include.ukp12-dowload');
                }
            } else if($view == 'l') {
                if(Laratrust::hasRole('secretariat')) {
                    if($pemohon->jenis_penempatan != 2) {
                        array_push($includes, ViewController::HOS_VIEW);
                        array_push($includes, ViewController::HOD_VIEW);
                    } else {
                        array_push($includes, ViewController::KADER_VIEW);
                    }
                    array_push($includes, ViewController::LNPK_FORM);
                } else {
                    if($pemohon->jenis_penempatan != 2) {
                        array_push($includes, ViewController::LNPK_VIEW);
                        array_push($includes, ViewController::HOS_VIEW);
                        array_push($includes, ViewController::HOD_VIEW);
                        array_push($includes, 'form.view.include.ukp12-dowload');
                    } else {
                        array_push($includes, ViewController::LNPK_VIEW);
                        array_push($includes, ViewController::KADER_VIEW);
                    }
                }
            } else if($view == 'h') {
                $user = Auth::user();
                if($user->hasRole('hod') && $user->nokp == $pemohon->nokp_ketua_jabatan) {
                    array_push($includes, ViewController::HOS_VIEW);
                    if(empty($pemohon->perakuan_ketua_jabatan_tkh)) {
                        array_push($includes, ViewController::HOD_FORM);
                    } else {
                        array_push($includes, ViewController::HOD_VIEW);
                    }
                } else {
                    if($pemohon->jenis_penempatan != 2) {
                        array_push($includes, ViewController::LNPK_VIEW);
                        array_push($includes, ViewController::HOS_VIEW);
                        array_push($includes, ViewController::HOD_VIEW);
                        array_push($includes, 'form.view.include.ukp12-dowload');
                    } else {
                        array_push($includes, ViewController::LNPK_VIEW);
                        array_push($includes, ViewController::KADER_VIEW);
                    }
                }

            } else if($view == 's') {
                $user = Auth::user();
                if($user->hasRole('clerk') && $user->nokp == $pemohon->pengesahan_perkhidmatan_nokp) {
                    if(empty($pemohon->pengesahan_perkhidmatan_tkh)) {
                        array_push($includes, ViewController::HOS_FORM);
                    } else {
                        array_push($includes, ViewController::HOS_VIEW);
                    }
                } else {
                    if($pemohon->jenis_penempatan != 2) {
                        array_push($includes, ViewController::LNPK_VIEW);
                        array_push($includes, ViewController::HOS_VIEW);
                        array_push($includes, ViewController::HOD_VIEW);
                    } else {
                        array_push($includes, ViewController::LNPK_VIEW);
                        array_push($includes, ViewController::KADER_VIEW);
                    }
                }

            }

            return view('form.view.ukp12_view',[
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
                'akuan_pegawai' => $akuan_pegawai,
                'lnpt' => $markah,
                'clerk' => $clerk,
                'hod' => $hod,
                'tatatertib' => $tatatertib,
                'sumbangan' => $contribution,
                'pages' => $includes
            ]);
    }

    public function load_view(Request $request,$id) {
        $year = Carbon::parse(Date::now())->format('Y');
        $pemohon = Pemohon::find($id);
        $peribadi = Peribadi::find($pemohon->id_peribadi);
        $cuti = Cuti::where('id_pemohon',$pemohon->id)->get();
        $harta = Harta::where('id_pemohon',$pemohon->id)->first();
        $pasangan = Pasangan::where('id_pemohon',$pemohon->id)->first();
        $perkhidmatan = Perkhidmatan::where('id_pemohon',$pemohon->id)->get();
        $pertubuhan = Pertubuhan::where('pemohon_id',$pemohon->id)->get();
        $akademik = Akademik::where('id_pemohon',$pemohon->id)->get();
        $profesional = Professional::where('id_pemohon',$pemohon->id)->get();
        $kompetenan = Kompetensi::where('id_pemohon',$pemohon->id)->get();
        $pengiktirafan= Pengiktirafan::where('id_pemohon',$pemohon->id)->get();
        $akuan_pinjaman = PinjamanPendidikan::where('id_pemohon',$pemohon->id)->first();
        $akuan_pegawai = PengakuanPemohon::where('id_pemohon',$pemohon->id)->first();
        $lnpt = Markah::where('nokp',$peribadi->nokp)->whereIn('tahun',[$year-1,$year-2,$year-3])->orderBy('tahun','desc')->limit(3)->get();
        $clerk = ListPegawai2::getMaklumatPegawai($pemohon->pengesahan_perkhidmatan_nokp);
        $hod = ListPegawai2::getMaklumatPegawai($pemohon->nokp_ketua_jabatan);
        $tatatertib = TatatertibUkp12::where('id_pemohon',$pemohon->id)->first();
        $contribution = Sumbangan::where('pemohon_id',$pemohon->id)->get();

        $rekod_markah =  LnptUkp12::where('id_pemohon',$pemohon->id)->orderBy('tahun','desc')->get();
        $markah =  collect([]);

        if($rekod_markah->count() == 0) {
            $first = new stdClass;
            $first->tahun = $year-1;
            $first->purata = 0;
                $markah->push($first);
            $second = new stdClass;
            $second->tahun = $year-2;
            $second->purata = 0;
                $markah->push($second);
            $third = new stdClass;
            $third->tahun = $year-3;
            $third->purata = 0;
                $markah->push($third);
            if(!empty($lnpt)) {
                $markah->each(function ($item, $key) use ($lnpt) {
                    foreach($lnpt as $l) {
                        if($l->tahun == $item->tahun) {
                            $item->purata = $l->purata;
                        }
                    }
                });
            }
        } else {
            $markah = $rekod_markah;
            $markah->each(function ($item, $key) {
                $item->purata = $item->markah;
            });
        }

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
            'akuan_pegawai' => $akuan_pegawai,
            'lnpt' => $markah,
            'clerk' => $clerk,
            'hod' => $hod,
            'tatatertib' => $tatatertib,
            'sumbangan' => $contribution
        ]);
    }

    public function urussetia_submit(Request $request) {
        $pemohon_id = $request->input('pemohon_id');
        $pengesahan = $request->input('pengesahan');
        $jenis_hukuman = $request->input('jenis');
        $tkh_hukuman = $request->input('tkh');
        $pemohon = Pemohon::find($pemohon_id);

        $lnpts = json_decode($request->input('lnpts'));

        $record = LnptUkp12::where('id_pemohon',$pemohon_id)->orderBy('tahun','desc')->get();
        $index = 0;
        foreach($lnpts as $lnpt) {
            $model = NULL;
            if(isset($record[$index])) {
                $model = $record[$index];
            } else {
                $model = new LnptUkp12();
                $model->created_by = Auth::user()->nokp;
            }

                $model->updated_by = Auth::user()->nokp;
                $model->flag = 1;
                $model->delete_id = 0;
                $model->id_pemohon = $pemohon_id;
                $model->tahun = $lnpt->tahun;
                $model->markah = $lnpt->purata;
                $model->save();

                $index++;
        }

        // foreach($lnpts as $lnpt) {
        //     $record = LnptUkp12::where('tahun',$lnpt->tahun)->where('id_pemohon',$pemohon_id)->first();
        //     if(empty($record)) {
        //         $record = new LnptUkp12();
        //         $record->created_by = Auth::user()->nokp;
        //     }
        //         $record->updated_by = Auth::user()->nokp;
        //         $record->flag = 1;
        //         $record->delete_id = 0;
        //         $record->id_pemohon = $pemohon_id;
        //         $record->tahun = $lnpt->tahun;
        //         $record->markah = $lnpt->purata;
        //         $record->save();
        // }

        $tatatertib = TatatertibUkp12::where('id_pemohon',$pemohon_id)->first();

        if(empty($tatatertib)) {
            $tatatertib = new TatatertibUkp12;
            $tatatertib->flag = 1;
            $tatatertib->delete_id = 0;
            $tatatertib->created_by = Auth::user()->nokp;
        }

        $tatatertib->updated_by = Auth::user()->nokp;
        $tatatertib->pengesahan_tindakan = $pengesahan;
        $tatatertib->jenis_hukuman = $jenis_hukuman;
        $tatatertib->tkh_hukuman = empty($tkh_hukuman) ? NULL : Carbon::createFromFormat('d-m-Y', $tkh_hukuman)->format('Y-m-d');
        $tatatertib->id_pemohon = $pemohon_id;

        if($tatatertib->save()) {
            $pemohon->status = Pemohon::WAITING_VERDICT;
            $pemohon->updated_by = Auth::user()->nokp;
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

    public function kerani_submit(Request $request) {
        $pemohon_id = $request->input('pemohon_id');

        $pengesahan = $request->input('pengesahan');
        $nama = $request->input('nama');
        $jawatan = $request->input('jawatan');
        $jabatan = $request->input('jabatan');
        //$tkh_pengesahan = $request->input('tkh_pengesahan');
        $pemohon = Pemohon::find($pemohon_id);
        $user_pemohon = User::find($pemohon->user_id);
        $pemohon->pengesahan_perkhidmatan = $pengesahan;
        $pemohon->pengesahan_perkhidmatan_jawatan = $jawatan;
        $pemohon->pengesahan_perkhidmatan_cawangan = $jabatan;
        $pemohon->pengesahan_perkhidmatan_tkh = Date::now();
        $pemohon->pengesahan_perkhidmatan_nama = $nama;
        if($pemohon->save()) {
            $ketua_user = User::addOrUpdate($pemohon->nokp_ketua_jabatan);
        if(!$ketua_user->hasRole('hod')) {
            $ketua_user->attachRole('hod');
        }
                $secure_link = Crypt::encryptString($pemohon->id);
                $content = [
                    'link' => url('/')."/form/ukp12/eview/".$secure_link."?view=h",
                    'gred' => $pemohon->gred,
                    'jawatan' => $pemohon->jawatan,
                    'nokp' => $user_pemohon->nokp,
                    'nama' => $user_pemohon->name
                ];
                Mail::mailer('smtp')->send('mail.perakui-mail',$content,function($message) use ($ketua_user) {
                    // testing purpose
                    //',$ketua_user->name);
                    //$message->to('munirahj@jkr.gov.my',$ketua_user->name);
                    $message->to($ketua_user->email,$ketua_user->name);
                    $message->subject('PERAKUAN KETUA JABATAN UNTUK URUSAN PEMANGKUAN');

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
    }

    Public function ketua_submit(Request $request) {
        $pemohon_id = $request->input('pemohon_id');
        $pengesahan = $request->input('pengesahan');
        $nama = $request->input('nama');
        $jawatan = $request->input('jawatan');
        $jabatan = $request->input('jabatan');
        $ulasan = $request->input('ulasan');

        $pemohon = Pemohon::find($pemohon_id);
        $pemohon->perakuan_ketua_jabatan = $pengesahan;
        $pemohon->perakuan_ketua_jabatan_jawatan = $jawatan;
        $pemohon->perakuan_ketua_jabatan_alamat_pejabat = $jabatan;
        $pemohon->perakuan_ketua_jabatan_tkh = Date::now();
        $pemohon->perakuan_ketua_jabatan_nama = $nama;
        $pemohon->perakuan_ketua_jabatan_ulasan = $ulasan;

        $pemohon->status = Pemohon::PROCESSING;

        if($pemohon->save()) {
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

    public function download_form_full(Request $request) {
        $year = Carbon::parse(Date::now())->format('Y');
        $formdata = $request->input('dataform');
        $pemohon = Pemohon::find($formdata);
        $permohonan = $pemohon->pemohonPermohonan;
        $peribadi = Peribadi::find($pemohon->id_peribadi);
        $cuti = Cuti::where('id_pemohon',$pemohon->id)->get();
        $harta = Harta::where('id_pemohon',$pemohon->id)->first();
        $pasangan = Pasangan::where('id_pemohon',$pemohon->id)->first();
        $perkhidmatan = Perkhidmatan::where('id_pemohon',$pemohon->id)->get()->toArray();
        $pertubuhan = Pertubuhan::where('pemohon_id',$pemohon->id)->get()->toArray();
        $akademik = Akademik::where('id_pemohon',$pemohon->id)->get()->toArray();
        $profesional = Professional::where('id_pemohon',$pemohon->id)->get();
        $kompetenan = Kompetensi::where('id_pemohon',$pemohon->id)->get();
        $pengiktirafan= Pengiktirafan::where('id_pemohon',$pemohon->id)->get();
        $akuan_pinjaman = PinjamanPendidikan::where('id_pemohon',$pemohon->id)->first();
        $akuan_pegawai = PengakuanPemohon::where('id_pemohon',$pemohon->id)->first();
        $contribution = Sumbangan::where('pemohon_id',$pemohon->id)->get();
        $tatatertib = TatatertibUkp12::where('id_pemohon',$pemohon->id)->first();
        $rekod_markah =  LnptUkp12::where('id_pemohon',$pemohon->id)->orderBy('tahun','desc')->get();
        $markah =  collect([]);

        if($rekod_markah->count() == 0) {
            $first = new stdClass;
            $first->tahun = $year-1;
            $first->purata = 0;
                $markah->push($first);
            $second = new stdClass;
            $second->tahun = $year-2;
            $second->purata = 0;
                $markah->push($second);
            $third = new stdClass;
            $third->tahun = $year-3;
            $third->purata = 0;
                $markah->push($third);
            if(!empty($lnpt)) {
                $markah->each(function ($item, $key) use ($lnpt) {
                    foreach($lnpt as $l) {
                        if($l->tahun == $item->tahun) {
                            $item->purata = $l->purata;
                        }
                    }
                });
            }
        } else {
            $markah = $rekod_markah;
            $markah->each(function ($item, $key) {
                $item->purata = $item->markah;
            });
        }

        $data = [
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
            'akuan_pegawai' => $akuan_pegawai,
            'sumbangan' => $contribution,
            'borang' => $permohonan,
            'lnpt' => $markah,
            'tatatertib' => $tatatertib
        ];

        $pdf = PDF::loadView('pdf.ukp12', $data, []);
        return $pdf->stream('Borang_UKP12_'.$peribadi->nokp.'.pdf');

        //return PdfRender::render('pdf.ukp12', $data, ['Borang','UKP12',$peribadi->nokp]);
    }

}
