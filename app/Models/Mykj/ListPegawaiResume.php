<?php

namespace App\Models\Mykj;

use App\Models\Pink\LampiranBebanKerja;
use App\Models\Pink\LampiranIstiharHarta;
use App\Models\Pink\Resume;
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

    public function getIsytiharHarta(){
        return $this->hasOne(LampiranIstiharHarta::class, 'nokp', 'nokp')->orderBy('id', 'desc');
    }

    public function getResume(){
        return $this->hasOne(Resume::class, 'nokp', 'nokp')->orderBy('id', 'desc');
    }
}
