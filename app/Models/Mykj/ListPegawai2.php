<?php

namespace App\Models\Mykj;
use App\Models\Mykj\LWaranPej;
use App\Models\Mykj\Pengalaman;
use App\Models\Mykj\Kelayakan;
use App\Models\Mykj\Perkhidmatan;
use App\Models\Mykj\Peribadi;
use App\Models\Mykj\Markah;

use Illuminate\Database\Eloquent\Model;

class ListPegawai2 extends Model
{

    protected $connection = 'pgsqlmykj';
    protected $table = 'list_pegawai2';
//    public $timestamps = false;

    public function getPerkhidmatan(){
        return $this->hasOne(Perkhidmatan::class, 'nokp', 'nokp')->where('flag', 1)->orderBy('id_perkhidmatan', 'desc');
    }

    public static function getMaklumatPegawai(Int $no_ic) : array{
        $data = [];
        $maklumatPegawaiGet = ListPegawai2::where('nokp', $no_ic)->first();

        if($maklumatPegawaiGet) {
            $maklumatPegawai = $maklumatPegawaiGet;

            $data['nokp'] = $no_ic;
            $data['name'] = html_entity_decode($maklumatPegawai->nama, ENT_QUOTES | ENT_HTML5);
            $data['tel_bimbit'] = $maklumatPegawai->tel_bimbit;
            $data['tel_pejabat'] = $maklumatPegawai->tel_pejabat;
            $data['alamat_pejabat'] = $maklumatPegawai->alamat_pejabat;
            $data['gred'] = $maklumatPegawai->kod_gred;
            $data['email'] = $maklumatPegawai->email;
            $data['jawatan'] = $maklumatPegawai->jawatan;
            $data['waran_split'] = ListPegawai2::split_kod_waran($maklumatPegawai->kod_waran);
            $data['waran_name'] = ListPegawai2::split_kod_waran_name($data['waran_split']);
            $data['pengalaman'] = ListPegawai2::pengalaman($no_ic);
            $data['kelayakan'] = ListPegawai2::kelayakan($no_ic);
            $data['perkhidmatan'] = ListPegawai2::perkhidmatan($no_ic);
            $data['peribadi'] = ListPegawai2::peribadi($no_ic);
            $data['markah'] = ListPegawai2::markah($no_ic);
        }

        return $data;
    }

    public static function markah($ic){
        $data= [];


        $model = Markah::where('nokp', $ic)->whereBetween('tahun', [2017, 2019])->get();

        if($model){
            foreach($model as $m){
                $data[] = [
                    'tahun' => $m->tahun,
                    'purata' => $m->purata
                ];
            }
        }

        return $data;
    }

    public static function pengalaman($ic){
        $data= [];

        $model = Pengalaman::where('nokp', $ic)->get();

        if($model){
            foreach($model as $m){
                $data[] = [
                    'tempat' => $m->tempat,
                    'mula' => $m->tkh_mula,
                    'tamat' => $m->tkh_tamat
                ];
            }
        }

        return $data;
    }

    public static function kelayakan($ic){
        $data= [];

        $model = Kelayakan::where('nokp', $ic)->where('kod_kelulusan', '!=','8,9,10,20')->get();

        if($model){
            foreach($model as $m){
                $data[] = [
                    'nama_kelulusan' => $m->nama_kelulusan,
                    'institusi' => $m->institusi,
                    'tkh_kelulusan' => $m->tkh_kelulusan
                ];
            }
        }

        return $data;
    }

    public static function perkhidmatan($ic){
        $data= [];

        $model = Perkhidmatan::where('nokp', $ic)->where('flag',1)->get();

        if($model){
            foreach($model as $m){
                $data[] = [
                    'kod_gred' => $m->kod_gred,
                    'kod_jawatan' => $m->kod_jawatan,
                    'taraf'=> $m->PerkhidmatanTaraf->perkhidmatan,
                    'skim' => $m->LKumpulan ? $m->LKumpulan->kumpulan : '',
                    'gred_hakiki' =>$m->kod_gred,
                    'tkh_mula_gred_hakiki' =>$m->tkh_lantik
                ];
            }
        }

        return $data;
    }

    public static function peribadi($ic){
        $data=[];

        $model = Peribadi::where('nokp', $ic)->first();

         if($model){
            $data = [
                'tkh_lahir' => $model->tkh_lahir,
                'tempat_lahir' => $model->Lnegeri ? $model->Lnegeri->negeri : '',
                'alamat_rumah'=> $model->alamat,
                'taraf_perkahwinan' => $model->LTarafPerkahwinan ? $model->LTarafPerkahwinan->taraf_perkahwinan : '',
                'no_fax' => $model->fax_pejabat,
                'tel_bimbit' => $model->tel_bimbit,
                'gambar' => $model->gambar,
                'tkh_wajib_bersara' => $model->tkh_bersara

            ];
        }

        return $data;

    }

    public static function split_kod_waran($kod_waran){
        $data['sektor'] = substr($kod_waran, 0, 2).'0000000000';
        $data['cawangan'] = substr($kod_waran, 0, 4).'00000000';
        $data['bahagian'] = substr($kod_waran, 0, 6).'000000';
        $data['unit'] = substr($kod_waran, 0, 8).'0000';
        $data['waran_penuh'] = $kod_waran;

        return $data;
    }

    public static function split_kod_waran_name($waran_split_arr) : array{
        $data = [];

        foreach ($waran_split_arr as $name => $waran){
            $penempatan_name = LWaranPej::where('kod_waran_pej', $waran)->where('ref_id', 0)->where('flag', 1)->first();
            $data[$name] = $penempatan_name ? $penempatan_name->waran_pej : 'Tiada Info Penempatan';
        }

        return $data;
    }

    public static function getWaranName($kod_waran) : String{
        $model = LWaranPej::where('kod_waran_pej', $kod_waran)->where('ref_id', 0)->where('flag', 1)->first();
        return $model ? $model->waran_pej : 'Tiada Info Penempatan';
    }

    public static function getMaklumatPegawaiTanpaWaran($no_ic){
        $maklumatPegawai = ListPegawai2::where('nokp', $no_ic)->first();

        if($maklumatPegawai){
            $data['nokp'] = $no_ic;
            $data['name'] = $maklumatPegawai->nama ?? '';
            $data['tel_bimbit'] = $maklumatPegawai->tel_bimbit ?? 'Tiada Telefon Bimbit';
            $data['tel_pejabat'] = $maklumatPegawai->tel_pejabat ?? 'Tiada Telefon Pejabat';
            $data['alamat_pejabat'] = $maklumatPegawai->alamat_pejabat ?? 'Tiada Alamat';
            $data['gred'] = $maklumatPegawai->kod_gred ?? 'Tiada Gred';
            $data['email'] = $maklumatPegawai->email ?? 'Tiada Emel';
            $data['jawatan'] = $maklumatPegawai->jawatan ?? 'Tiada Jawatan';
        }
        return $data;
    }
}
