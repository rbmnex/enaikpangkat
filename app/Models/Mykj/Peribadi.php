<?php
namespace App\Models\Mykj;

use Illuminate\Database\Eloquent\Model;

class Peribadi extends Model 
{
    
    protected $connection = 'pgsqlmykj';
    protected $table = 'peribadi';

    public function Lnegeri()
    {
        return $this->hasOne(LNegeri::class, 'kod_negeri','kod_negeri_lahir');
    }

     public function LTarafPerkahwinan()
    {
        return $this->hasOne(LTarafPerkahwinan::class, 'kod_taraf_perkahwinan','kod_taraf_perkahwinan');
    }

   

}
