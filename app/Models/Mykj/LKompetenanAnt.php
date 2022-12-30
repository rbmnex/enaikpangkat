<?php

namespace App\Models\Mykj;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LKompetenanAnt extends Model
{
    use HasFactory;
    protected $table = "l_kompetenan_ant";
    protected $connection = 'pgsqlmykj';
}
