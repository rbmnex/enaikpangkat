<?php

namespace App\Models\Urussetia;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calon extends Model
{
    use HasFactory;
    protected $table = "calon";
    protected $connection = 'pgsql';

    public function kumpulan() {
        return $this->belongsTo(Kumpulan::class,'kumpulan_id','id');
    }
}
