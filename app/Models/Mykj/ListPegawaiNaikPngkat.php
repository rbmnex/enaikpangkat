<?php

namespace App\Models\Mykj;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListPegawaiNaikPngkat extends Model
{
    use HasFactory;
    protected $table = "list_pegawai_naikpangkat";
    protected $connection = 'pgsqlmykj';
}
