<?php

namespace App\Models\Profail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class Penempatan extends Model
{
    use HasFactory;
    protected $table = "penempatan";
    protected $connection = 'pgsql';

    public static function create($id_peribadi,$nokp) {

        $khidmat = DB::connection('pgsqlmykj')->table('perkhidmatan as p')
        ->join('l_jawatan as j', 'j.kod_jawatan', 'p.kod_jawatan')
        ->select('p.kod_gred','p.kod_jawatan','j.jawatan')
        ->where('nokp',$nokp)->where('flag',1)->first();

        $tempat = DB::connection('pgsqlmykj')->table('penempatanx as p')
        ->select('p.kod_waran')->where('nokp',$nokp)->where('flag',1)->first();

            $model = new Penempatan;

            $model->gred = $khidmat->kod_gred;
            $model->kod_gred = $khidmat->kod_gred;
            $model->jawatan = $khidmat->jawatan;
            $model->kod_jawatan = $khidmat->kod_jawatan;

            $model->kod_waran = $tempat->kod_waran;

            $arr_waran = Penempatan::split_kod_waran($tempat->kod_waran);

            $model->unit = Penempatan::waran_name($arr_waran['unit'])->waran_pej;
            $model->bahagian = Penempatan::waran_name($arr_waran['bahagian'])->waran_pej;
            $pejabat = Penempatan::waran_name($arr_waran['cawangan']);
            $model->cawangan = $pejabat->waran_pej;
            $model->pejabat = $pejabat->blok;

            $model->id_peribadi = $id_peribadi;
            $model->created_by = 'MYKJ';
            $model->updated_by = 'MYKJ';

            $model->flag = 1;
            $model->delete_id =0;

            $model->save();
    }

    public static function recreate($user_id,$nokp) {


        $khidmat = DB::connection('pgsqlmykj')->table('perkhidmatan as p')
        ->join('l_jawatan as j', 'j.kod_jawatan', 'p.kod_jawatan')
        ->select('p.kod_gred','p.kod_jawatan','j.jawatan')
        ->where('nokp',$nokp)->where('flag',1)->first();

        $tempat = DB::connection('pgsqlmykj')->table('penempatanx as p')
        ->select('p.kod_waran')->where('nokp',$nokp)->where('flag',1)->first();

            $model = Penempatan::where('user_id',$user_id)->where('flag', 1)->where('delete_id',0)->first();

            if(empty($model)) {
                $model = new Penempatan;
            }

            $model->gred = $khidmat->kod_gred;
            $model->kod_gred = $khidmat->kod_gred;
            $model->jawatan = $khidmat->jawatan;
            $model->kod_jawatan = $khidmat->kod_jawatan;

            $model->kod_waran = $tempat->kod_waran;

            $arr_waran = Penempatan::split_kod_waran($tempat->kod_waran);

            $unit = Penempatan::waran_name($arr_waran['unit']);
            $model->unit = empty($unit) ? '' : $unit->waran_pej;
            $bahagian = Penempatan::waran_name($arr_waran['bahagian']);
            $model->bahagian = empty($bahagian) ? '' : $bahagian->waran_pej;
            $pejabat = Penempatan::waran_name($arr_waran['cawangan']);
            $model->cawangan = empty($pejabat) ? '' : $pejabat->waran_pej;
            $model->pejabat = empty($pejabat) ? '' : $pejabat->blok;

            //$model->id_peribadi = $id_peribadi;
            $model->user_id = $user_id;
            $model->created_by = 'MYKJ';
            $model->updated_by = 'MYKJ';

            $model->flag = 1;
            $model->delete_id =0;

            $model->save();
    }


    public static function split_kod_waran($kod_waran){
        $data = [];
        $data['sektor'] = substr($kod_waran, 0, 2).'0000000000';
        $data['cawangan'] = substr($kod_waran, 0, 4).'00000000';
        $data['bahagian'] = substr($kod_waran, 0, 6).'000000';
        $data['unit'] = substr($kod_waran, 0, 8).'0000';
        $data['waran_penuh'] = $kod_waran;

        return $data;
    }

    public static function waran_name($kod_waran) {
        $pejabat = DB::connection('pgsqlmykj')->table('l_waran_pej')
        ->select('waran_pej','blok')
        ->where('kod_waran_pej', $kod_waran)->where('ref_id', 0)->where('flag', 1)->first();
        return $pejabat;
    }



}
