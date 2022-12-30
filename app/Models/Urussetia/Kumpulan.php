<?php

namespace App\Models\Urussetia;

use App\Models\Permohonan\PermohonanUkp12;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kumpulan extends Model
{
    use HasFactory;
    protected $table = "kumpulan";
    protected $connection = 'pgsql';

    public function calons() {
        return $this->hasMany(Calon::class,'kumpulan_id','id')->where('flag',1)->where('delete_id',0);
    }

    public function permohonan() {
        return $this->hasOne(PermohonanUkp12::class,'id','permohonan_id');
    }
}
