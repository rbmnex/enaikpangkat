<?php

namespace App\Models\Mykj;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LGelaranJawatan extends Model
{
    use HasFactory;
    protected $table = 'l_gelaran_jawatan';
    protected $connection = 'pgsqlmykj';
}
