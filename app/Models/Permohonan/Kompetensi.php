<?php

namespace App\Models\Permohonan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\File;

class Kompetensi extends Model
{
    use HasFactory;
    protected $table = "sijil_kompeten";
    protected $connection = 'pgsql';

    public function file() {
        return $this->hasOne(File::class, 'id', 'fail');
    }
}
