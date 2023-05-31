<?php

namespace App\Models\Resume;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BatchResume extends Model
{
    use HasFactory;
    protected $table = "kump_resume";
    protected $connection = 'pgsql';

    public function members() {
        return $this->hasMany(ResumeMember::class,'id_kump','id');
    }
}
