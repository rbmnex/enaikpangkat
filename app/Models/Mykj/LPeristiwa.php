<?php

namespace App\Models\Mykj;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LPeristiwa extends Model
{
    use HasFactory;
    protected $connection = 'pgsqlmykj';
    protected $table = 'l_peristiwa';

}
