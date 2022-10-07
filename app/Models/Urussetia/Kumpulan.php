<?php

namespace App\Models\Urussetia;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kumpulan extends Model
{
    use HasFactory;
    protected $table = "kumpulan";
    protected $connection = 'pgsql';

    public function calons() {
        return $this->hasMany(Calon::class,'kumpulan_id','id');
    }
}
