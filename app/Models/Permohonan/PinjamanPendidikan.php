<?php

namespace App\Models\Permohonan;

use App\Models\File;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PinjamanPendidikan extends Model
{
    use HasFactory;
    protected $table = "pinjaman_pendidikan";
    protected $connection = 'pgsql';

    public function file() {
        return $this->hasOne(File::class,'id','surat_perakuan');
    }
}
