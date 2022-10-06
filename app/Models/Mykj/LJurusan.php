<?php

namespace App\Models\Mykj;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LJurusan extends Model
{
    use HasFactory;
    protected $table = "l_jurusan";
    protected $connection = 'pgsqlmykj';
}
