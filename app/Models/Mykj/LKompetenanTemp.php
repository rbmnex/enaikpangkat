<?php

namespace App\Models\Mykj;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LKompetenanTemp extends Model
{
    use HasFactory;
    protected $table = "l_kompetenan_temp";
    protected $connection = 'pgsqlmykj';
}
