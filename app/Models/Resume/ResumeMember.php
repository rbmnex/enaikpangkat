<?php

namespace App\Models\Resume;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResumeMember extends Model
{
    use HasFactory;
    protected $table = "ahli_resumes";
    protected $connection = 'pgsql';

    public function batch() {
        return $this->hasOne(BatchResume::class, 'id', 'id_kump');
    }
}
