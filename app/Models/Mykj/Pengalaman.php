<?php

namespace App\Models\Mykj;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengalaman extends Model
{
    use HasFactory;
    protected $connection = 'pgsqlmykj';
    protected $table = "pengalaman";

    public function gelaran_jawatan() {
        return $this->belongsTo(LGelaranJawatan::class,'kod_gelaran_jawatan','kod_gelaran_jawatan');
    }
}
