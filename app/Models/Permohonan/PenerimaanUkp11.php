<?php

namespace App\Models\Permohonan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenerimaanUkp11 extends Model
{
    use HasFactory;
    protected $table = "penerimaan_ukp11";

    public function ukp11Pemohon(){
        return $this->hasOne(Pemohon::class, 'id', 'id_pemohon');
    }
}
