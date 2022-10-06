<?php

namespace App\Models\Profail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class Peribadi extends Model
{
    use HasFactory;
    protected $table = "peribadi";
    protected $connection = 'pgsql';

    public static function create($userid,$info) {
        $arr_info = get_object_vars($info);
        $array_keys = array_keys($arr_info);

        $renew = true;

        // Peribadi::where('users_id',$userid)->update([
        //     'flag' => 0,
        //     'deleted' => 1,
        //     'updated_by' => 'SYSTEM'
        // ]);

        //$container = Peribadi::where('users_id',$userid)->where('flag',1)->where('delete_id',0)->get();

        $model = new Peribadi;

        foreach ($array_keys as $array_key) {
            if($array_key == 'masuk_oleh' || $array_key == 'kemaskini_oleh' || $array_key == 'flag' || $array_key == 'katalaluan' || $array_key == 'tkh_masuk' || $array_key == 'tkh_kemaskini') {
                // skip and continue
            } else {
                $value = $arr_info[$array_key];

                // check any changes on information and add flag to create new
                // if($container) {
                //     if($renew) {
                //         if(!($container->$array_key == $value)) {
                //             $renew = false;

                //             Peribadi::where('users_id',$userid)->update([
                //                 'flag' => 0,
                //                 'deleted' => 1,
                //                 'updated_by' => 'SYSTEM',
                //                 'updated_at' => Date::now()
                //             ]);
                //         }
                //     }

                // } else {
                //     $renew = false;
                // }

                $model->$array_key = $value;
            }
        }
        $model->users_id = $userid;
        $model->flag = 1;
        $model->delete_id = 0;
        $model->created_by = 'MYKJ';
        $model->updated_by = 'MYKJ';
        $model->save();

        Penempatan::create($model->id,$arr_info['nokp']);
        // if(!$renew) {
        //     if() {
        //     }
        // } else {
        //     Penempatan::create($container->id,$arr_info['nokp']);
        // }

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
