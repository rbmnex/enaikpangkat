<?php

namespace App\Models\Permohonan;

use App\Models\File;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    use HasFactory;
    protected $table = "cuti";
    protected $connection = 'pgsql';


    public function file() {
        return $this->hasOne(File::class, 'id', 'surat_kelulusan');
    }

}
