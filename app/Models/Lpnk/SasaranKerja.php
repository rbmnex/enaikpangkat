<?php

namespace App\Models\Lpnk;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SasaranKerja extends Model
{
    use HasFactory;
    protected $table = "sasaran_kerja";
    protected $connection = 'pgsql';
}
