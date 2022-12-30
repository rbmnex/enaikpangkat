<?php

namespace App\Models\Mykj;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LKompetenanPro extends Model
{
    use HasFactory;
    protected $table = "l_kompetenan_profesional";
    protected $connection = 'pgsqlmykj';
}
