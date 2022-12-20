<?php

namespace App\Models\Permohonan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professional extends Model
{
    use HasFactory;
    protected $table = "professional";
    protected $connection = 'pgsql';

    public function file() {
        return $this->hasOne(File::class, 'id', 'file_id');
    }
}
