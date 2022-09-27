<?php

namespace App\Http\Controllers\Form;

use App\Http\Controllers\Controller;
use App\Models\Mykj\Gaji;
use App\Models\Mykj\LAgama;
use App\Models\Mykj\LBangsa;
use App\Models\Profail\Penempatan;
use App\Models\Profail\Peribadi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UkpController extends Controller
{
    //

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

    public function open(Request $request,$id) {
        $nokp = $request->input('kp');

        $user = User::where('nokp',$nokp)->first();

        if(empty($user)) {
            User::upsert($nokp);
            $user = User::where('nokp',$nokp)->first();
        }

        $profile = Peribadi::where('users_id',$user->id)->where('flag',1)->where('delete_id',0)->first();
        $khidmat = DB::connection('pgsqlmykj')->table('perkhidmatan as p')
        ->join('l_jawatan as j', 'j.kod_jawatan','p.kod_jawatan')
        ->select('p.kod_gred','p.kod_jawatan','j.jawatan', 'p.tkh_lantik', 'p.tkh_sah_perkhidmatan')
        ->where('nokp',$nokp)->where('flag',1)->first();


        $gaji = Gaji::where('nokp',$nokp)->where('flag',1)->first();
        $agama = LAgama::all();
        $bangsa = LBangsa::all();

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

        return view('form.ukp12',[
            "profile" => $maklumat,
            "religious" => $agama,
            "race" => $bangsa
        ]);
    }

    public function load(Request $request) {
        $formid = $request->input('id');

    }
}
