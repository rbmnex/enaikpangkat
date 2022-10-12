<?php

namespace App\Http\Controllers\Form;

use App\Http\Controllers\Controller;
use App\Models\MyKj\Cuti;
use App\Models\Mykj\Gaji;
use App\Models\MyKj\Harta;
use App\Models\Mykj\Kelayakan;
use App\Models\Mykj\LAgama;
use App\Models\Mykj\LBangsa;
use App\Models\MyKj\Pengalaman;
use App\Models\Mykj\Peristiwa;
use App\Models\MyKj\Waris;
use App\Models\Permohonan\Pemohon;
use App\Models\Profail\Penempatan;
use App\Models\Profail\Peribadi;
use App\Models\Urussetia\Calon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
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

        $status = 'exist';
        $profile = NULL;
        $pemohon = NULL;

        $user = User::where('nokp',$nokp)->first();

        if(empty($user)) {
            $status = 'new';
            User::upsert($nokp);
            $user = User::where('nokp',$nokp)->first();
        }

        $profile = Peribadi::where('users_id',$user->id)->where('flag',1)->where('delete_id',0)->first();

        if($status == 'new') {
            $pemohon = new Pemohon;
            $pemohon->flag = 1;
            $pemohon->delete_id = 0;
            $pemohon->id_permohonan = $id;
            $pemohon->id_peribadi = $profile->id;
            $pemohon->created_by = $nokp;
            $pemohon->updated_by = $nokp;
            $pemohon->status = Pemohon::NOT_SUBMITTED;
            $pemohon->save();
        } else {
            $pemohon = Pemohon::where('id_peribadi',$profile->id)->where('id_permohonan', $id)->first();
            if($pemohon) {
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
                $pemohon->save();
            }
        }

        $maklumat = $this->load_info($profile,$nokp);

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

        // check pemohon can apply ukp12
        //Calon::where('nokp',$nokp)->first();

        $access = $this->verify_applicant($nokp,$formId);

        if(!$access) {
            return view('form.message',['message' => 'Anda Tidak Layak Untuk Mengambil Permohonan Ini!']);
        }

        $status = 'exist';
        $profile = NULL;
        $pemohon = NULL;

        $user = User::where('nokp',$nokp)->first();

        if(empty($user)) {
            $status = 'new';
            User::upsert($nokp);
            $user = User::where('nokp',$nokp)->first();
        }

        $profile = Peribadi::where('users_id',$user->id)->where('flag',1)->where('delete_id',0)->first();

        if($status == 'new') {
            $pemohon = new Pemohon;
            $pemohon->flag = 1;
            $pemohon->delete_id = 0;
            $pemohon->id_permohonan = $formId;
            $pemohon->id_peribadi = $profile->id;
            $pemohon->created_by = $nokp;
            $pemohon->updated_by = $nokp;
            $pemohon->status = Pemohon::NOT_SUBMITTED;
            $pemohon->save();
        } else {
            $pemohon = Pemohon::where('id_peribadi',$profile->id)->where('id_permohonan', $formId)->first();
            if($pemohon) {
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
                $pemohon->save();
            }
        }

        $maklumat = $this->load_info($profile,$nokp);

        return view('form.ukp12',[
            "profile" => $maklumat,
            "pemohon_id" =>$pemohon->id
        ]);
    }

    private function verify_applicant($nokp,$formId) {
        // check applicant is eligible
        $eligible = false;

        $calon = Calon::where('nokp',$nokp)->get();

        if(!empty($calon)) {
            $eligible = $calon->every(function ($item, $key) use ($formId) {
                if (!empty($item->kumpulan->permohonan_id) && ($item->kumpulan->permohonan_id == $formId)) {
                    return true;
                }
            });
        }

        return $eligible;

    }

    private function load_info($profile,$nokp) {
        $khidmat = DB::connection('pgsqlmykj')->table('perkhidmatan as p')
        ->join('l_jawatan as j', 'j.kod_jawatan','p.kod_jawatan')
        ->select('p.kod_gred','p.kod_jawatan','j.jawatan', 'p.tkh_lantik', 'p.tkh_sah_perkhidmatan')
        ->where('nokp',$nokp)->where('flag',1)->first();


        $gaji = Gaji::where('nokp',$nokp)->where('flag',1)->first();
        //$agama = LAgama::all();
        //$bangsa = LBangsa::all();
        $harta = Harta::where('nokp',$nokp)->max('tkh_istihar');
        $waris = Waris::where('nokp',$nokp)->where('kod_perhubungan', strtoupper($profile->jantina) == 'L' ? 4 : 3)->first();
        $cuti = Cuti::where('nokp',$nokp)->whereIn('jenis_cuti', array('CUTI TANPA GAJI',
        'CUTI SEPARUH GAJI',
        'CUTI BELAJAR BERGAJI',
        'CUTI BELAJAR SEPARUH GAJI'))->get();
        $pengalaman = Pengalaman::where('nokp',$nokp)->orderBy('tkh_mula', 'desc')->get();

        // $pengalaman->each(function ($item, $key) {

        // });

        $akademik = Kelayakan::where('nokp',$nokp)->whereNotIn('kod_kelulusan',[8,9,10,21,22,23])->get();
        $profesional = Kelayakan::where('nokp',$nokp)->where('kod_kelulusan',8)->get();
        $kompeten = Kelayakan::where('nokp',$nokp)->whereIn('kod_kelulusan',[9,10])->get();

        $iktiraf = Peristiwa::where('nokp',$nokp)->wherein('kod_peristiwa',['P8','A1','P10','A4'])->get();

        $maklumat = array();
                $maklumat['nama'] = $profile->nama;
                $maklumat['nokp_baru'] = $profile->nokp;
                $maklumat['nokp_lama'] = $profile->nokp_lama;
                $maklumat['jawatan'] = $khidmat->jawatan;
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
                $maklumat['tkh_istihar'] = empty($harta) ? 0 : $harta;
                $maklumat['pasangan'] = empty($waris) ? '' : $waris->nama;
                $maklumat['alamat_pasangan'] = empty($waris) ? '' : $waris->tempat_kerja;
                $maklumat['pekerjaan_pasangan'] = empty($waris) ? '' : $waris->pekerjaan;
                $maklumat['cuti'] = $cuti;
                $maklumat['pengalaman'] = $pengalaman;
                $maklumat['akademik'] = $akademik;
                $maklumat['profesional'] = $profesional;
                $maklumat['kompeten'] = $kompeten;
                $maklumat['pengiktirafan'] = $iktiraf;

        return $maklumat;
    }

    private function search_jawatan($nokp,$year) {
        /*
            select lgj.gelaran_jawatan, p.tkh_lantik  from perkhidmatan p
left join l_gelaran_jawatan lgj on p.kod_gelaran_jawatan = lgj.kod_gelaran_jawatan
where p.tkh_lantik <= '1992-11-29' and p.nokp = '591208086200'
order by p.tkh_lantik asc;

         */
        $result = DB::connection('pgsqlmykj')->table('perkhidmatan as p')
                    ->leftJoin('l_gelaran_jawatan as g','p.kod_gelaran_jawatan','g.kod_gelaran_jawatan')
                    ->select('p.gelaran_jawatan')
                    ->where(DB::raw(''))->get();
    }
}
