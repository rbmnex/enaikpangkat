<?php

namespace App\Models\Profail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Peribadi extends Model
{
    use HasFactory;
    protected $table = "peribadi";
    protected $connection = 'pgsql';

    public static function create($userid,$info) {
        $arr_info = get_object_vars($info);
        $array_keys = array_keys($arr_info);


        $model = new Peribadi;

        foreach ($array_keys as $array_key) {
            if($array_key == 'masuk_oleh' || $array_key == 'kemaskini_oleh' || $array_key == 'flag' || $array_key == 'katalaluan' || $array_key == 'tkh_masuk' || $array_key == 'tkh_kemaskini') {
                // skip and continue
            } else {
                $value = $arr_info[$array_key];

                $model->$array_key = $value;
            }
        }
        $model->users_id = $userid;
        $model->flag = 1;
        $model->delete_id = 0;
        $model->created_by = 'MYKJ';
        $model->updated_by = 'MYKJ';
        $model->save();

        //Penempatan::create($model->id,$arr_info['nokp']);

        return $model;
    }

    public static function recreate($userId,$nokp) {
        DB::connection('pgsql')->table('peribadi')->where('users_id',$userId)
            ->update(['flag' => 0, 'delete_id' =>1]);
        $model = new Peribadi;
        $info = DB::connection('pgsqlmykj')->table('public.peribadi as p')
                ->leftJoin('public.l_agama as la', 'p.kod_agama', 'la.kod_agama')
                ->leftJoin('public.l_taraf_perkahwinan as ltp', 'p.kod_taraf_perkahwinan', 'ltp.kod_taraf_perkahwinan')
                ->leftJoin('public.l_bangsa as lb', 'p.kod_bangsa', 'lb.kod_bangsa')
                ->leftJoin('public.l_negeri as ln2', 'p.kod_negeri_lahir', 'ln2.kod_negeri')
                ->select('p.*','la.agama','ltp.taraf_perkahwinan', 'lb.bangsa', 'ln2.negeri as negeri_lahir')
                ->where('p.nokp',$nokp)->first();

        $arr_info = get_object_vars($info);
        $array_keys = array_keys($arr_info);

        foreach ($array_keys as $array_key) {
            if($array_key == 'masuk_oleh' || $array_key == 'kemaskini_oleh' || $array_key == 'flag' || $array_key == 'katalaluan' || $array_key == 'tkh_masuk' || $array_key == 'tkh_kemaskini') {
                // skip and continue
            } else {
                $value = $arr_info[$array_key];

                $model->$array_key = $value;
            }
        }

        $model->users_id = $userId;
        $model->flag = 1;
        $model->delete_id = 0;
        $model->created_by = 'MYKJ';
        $model->updated_by = 'MYKJ';
        $model->save();

        return $model;
    }

    public static function update_peribadi($model,$nokp) {

        $info = DB::connection('pgsqlmykj')->table('public.peribadi as p')
                ->leftJoin('public.l_agama as la', 'p.kod_agama', 'la.kod_agama')
                ->leftJoin('public.l_taraf_perkahwinan as ltp', 'p.kod_taraf_perkahwinan', 'ltp.kod_taraf_perkahwinan')
                ->leftJoin('public.l_bangsa as lb', 'p.kod_bangsa', 'lb.kod_bangsa')
                ->leftJoin('public.l_negeri as ln2', 'p.kod_negeri_lahir', 'ln2.kod_negeri')
                ->select('p.*','la.agama','ltp.taraf_perkahwinan', 'lb.bangsa', 'ln2.negeri as negeri_lahir')
                ->where('p.nokp',$nokp)->first();

        $arr_info = get_object_vars($info);
        $array_keys = array_keys($arr_info);

        foreach ($array_keys as $array_key) {
            if($array_key == 'masuk_oleh' || $array_key == 'kemaskini_oleh' || $array_key == 'flag' || $array_key == 'katalaluan' || $array_key == 'tkh_masuk' || $array_key == 'tkh_kemaskini') {
                // skip and continue
            } else {
                $value = $arr_info[$array_key];

                $model->$array_key = $value;
            }
        }

        $model->updated_by = 'MYKJ';
        $model->save();

        return $model;
    }

    public static function info_pengguna($nokp) {
        $info = array();
        $peribadi = DB::connection('pgsqlmykj')->table('list_pegawai2 as p')->select('p.*')->where('nokp', $nokp)
            ->first();

        $info['nokp'] = $peribadi->nokp;
        $info['nama'] = $peribadi->nama;
        $info['jawatan'] = $peribadi->jawatan;
        $info['emel'] = $peribadi->email;
        $info['gred'] = $peribadi->kod_gred;

        $tempat = DB::connection('pgsqlmykj')->table('penempatanx as p')
        ->select('p.kod_waran')->where('nokp',$nokp)->where('flag',1)->first();

        $arr_waran = Penempatan::split_kod_waran($tempat->kod_waran);

        $unit = Penempatan::waran_name($arr_waran['unit']);
        $info['unit'] = empty($unit) ? '' : $unit->waran_pej;
        $bahagian = Penempatan::waran_name($arr_waran['bahagian']);
        $info['bahagian'] = empty($bahagian) ? '' : $bahagian->waran_pej;
        $pejabat = Penempatan::waran_name($arr_waran['cawangan']);
        $info['cawangan'] = empty($pejabat) ? '' : $pejabat->waran_pej;
        $info['pejabat'] = empty($pejabat) ? '' : $pejabat->blok;

        return $info;
    }
}
