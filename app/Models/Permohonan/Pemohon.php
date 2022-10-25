<?php

namespace App\Models\Permohonan;

use App\Models\File;
use App\Models\Pink\SuratPink;
use App\Models\Profail\Peribadi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemohon extends Model
{
    use HasFactory;
    protected $table = "pemohon";
    protected $connection = 'pgsql';

    // Belum Diterima
    public const NOT_SUBMITTED = 'BH';
    // Menunggu Pengesahan
    public const WAITING_VERIFICATION = "TA";
    // Menolakan Tawaran
    public const REJECTED_APPLICATION = "PT";
    // Sedang Diproses
    public const PROCESSING = "SP";
    // Lulus Lantikan
    public const SUCCESSED = "LL";
    // Gagal Lantikan
    public const FAILED = "GL";
    // Menolak Lantikan (penalti)
    public const REFUSED = "PL";
    // Menunggu jawapan
    public const WAITING_REPLY = "MJ";
    // Terima Lantikan
    public const ACCEPTED = "TL";

    public function  pemohonPeribadi(){
        return $this->hasOne(Peribadi::class, 'id', 'id_peribadi');
    }

    public function  pemohonPink(){
        return $this->hasOne(SuratPink::class, 'id_pemohon', 'id');
    }

    public function  pemohonPermohonan(){
        return $this->hasOne(PermohonanUkp12::class, 'id', 'id_permohonan');
    }

    public function  pemohonUkp11(){
        return $this->hasOne(PenerimaanUkp11::class, 'id_pemohon', 'id');
    }

    public function file() {
        return $this->hasOne(File::class, 'id', 'pengesahan_cuti');
    }
}
