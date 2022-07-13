<?php

namespace App\Models\Profail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
