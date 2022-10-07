<?php

namespace App\Models\Mykj;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Harta extends Model
{
    use HasFactory;
    protected $table = "istihar_harta";
    protected $connection = 'pgsqlmykj';
}
