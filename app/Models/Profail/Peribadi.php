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

    public static function create($userid,$info,$renew = false) {
        $arr_info = get_object_vars($info);
        $array_keys = array_keys($arr_info);

        if($renew) {
            Peribadi::where('users_id',$userid)->update([
                'flag' => 0,
                'deleted' => 1,
                'updated_by' => 'SYSTEM'
            ]);
        }

        $model = new Peribadi;
        foreach ($array_keys as $array_key) {
            if($array_key == 'masuk_oleh' || $array_key == 'kemaskini_oleh' || $array_key == 'flag' || $array_key == 'katalaluan' || $array_key == 'tkh_masuk' || $array_key == 'tkh_kemaskini') {
                // skip and continue
            } else {
                $model->$array_key = $arr_info[$array_key];
            }
        }
        $model->users_id = $userid;
        $model->flag = 1;
        $model->delete_id = 0;
        $model->created_by = 'MYKJ';
        $model->updated_by = 'MYKJ';
        if($model->save()) {
            Penempatan::create($model->id,$arr_info['nokp']);
        }
    }

    public static function info_pengguna($nokp) {
        $info = array();
        $peribadi = DB::connection('pgsqlmykj')->table('list_pegawai2 as p')->select('p.*')->where('nokp', $nokp)
            ->first();

        $info['nokp'] = $peribadi->nokp;
        $info['nama'] = $peribadi->nama;
        $info['jawatan'] = $peribadi->jawatan;
        $info['emel'] = $peribadi->email;

        $tempat = DB::connection('pgsqlmykj')->table('penempatanx as p')
        ->select('p.kod_waran')->where('nokp',$nokp)->where('flag',1)->first();

        $arr_waran = Penempatan::split_kod_waran($tempat->kod_waran);

        $info['unit'] = Penempatan::waran_name($arr_waran['unit'])->waran_pej;
        $info['bahagian'] = Penempatan::waran_name($arr_waran['bahagian'])->waran_pej;
        $pejabat = Penempatan::waran_name($arr_waran['cawangan']);
        $info['cawangan'] = $pejabat->waran_pej;
        $info['pejabat'] = $pejabat->blok;

        return $info;
    }
}
