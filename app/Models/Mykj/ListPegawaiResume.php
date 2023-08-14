<?php

namespace App\Models\Mykj;

use App\Models\Pink\LampiranBebanKerja;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListPegawaiResume extends Model
{
    use HasFactory;
    protected $table = "list_pegawai_resume_enaikpangkat";
    protected $connection = 'pgsqlmykj';

    public function getLampiran(){
        return $this->hasOne(LampiranBebanKerja::class, 'nokp', 'nokp')->orderBy('id', 'desc');
    }
}
