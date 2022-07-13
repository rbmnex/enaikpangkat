<?php

namespace App\Models;

use App\Models\Profail\Peribadi;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'nokp',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function register($nokp,$password,$type) {
        if($type) {
            // user have mykj - register here
            $mykjPeribadi = DB::connection('pgsqlmykj')->table('public.peribadi as p')
                ->leftJoin('public.l_agama as la', 'p.kod_agama', 'la.kod_agama')
                ->leftJoin('public.l_taraf_perkahwinan as ltp', 'p.kod_taraf_perkahwinan', 'ltp.kod_taraf_perkahwinan')
                ->leftJoin('public.l_bangsa as lb', 'p.kod_bangsa', 'lb.kod_bangsa')
                ->leftJoin('public.l_negeri as ln2', 'p.kod_negeri_lahir', 'ln2.kod_negeri')
                ->select('p.*','la.agama','ltp.taraf_perkahwinan', 'lb.bangsa', 'ln2.negeri as negeri_lahir')
                ->where('p.nokp',$nokp)->first();

            $user = User::where('nokp',$nokp)->first();
            if($user) {
                $user->email = $mykjPeribadi->email;
                $user->password = Hash::make($password);
                $user->updated_by = 'MYKJ';
                $user->save();
            } else {
                if($mykjPeribadi) {
                    $newuser = new User;

                    $newuser->name = $mykjPeribadi->nama;
                    $newuser->nokp = $mykjPeribadi->nokp;
                    $newuser->email = $mykjPeribadi->email;
                    $newuser->password = Hash::make($password);
                    $newuser->created_by = 'MYKJ';
                    $newuser->type = 1;
                    $newuser->flag = 1;
                    $newuser->delete_id = 0;

                    if($newuser->save()) {
                        // create user peribadi
                        Peribadi::create($newuser->id,$mykjPeribadi);
                        DB::table('role_user')->insert([
                            'role_id' => 2,
                            'user_id' => $newuser->id,
                            'user_type' => 'jkr',
                        ]);

                    }
                }
            }
        }
    }
}
