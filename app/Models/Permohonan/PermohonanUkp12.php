<?php

namespace App\Models\Permohonan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermohonanUkp12 extends Model
{
    use HasFactory;
    protected $table = "permohonan_ukp12";
    protected $connection = 'pgsql';
}
