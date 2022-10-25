<?php

namespace App\Models\Permohonan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengakuanPemohon extends Model
{
    use HasFactory;
    protected $table = "pergakuan_pemohon";
    protected $connection = 'pgsql';
}
