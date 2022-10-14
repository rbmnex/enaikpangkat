<?php

namespace App\Models;

use App\Models\Profail\Penempatan;
use App\Models\Profail\Peribadi;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasApiTokens, HasFactory, Notifiable;
    protected $connection = 'pgsql';

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

    public function user_roles() {
        return $this->belongsToMany(Role::class,'role_user','user_id','role_id');
    }

    public static function upsert($nokp,$id = NULL) {
        $mykjPeribadi = DB::connection('pgsqlmykj')->table('public.peribadi as p')
                ->leftJoin('public.l_agama as la', 'p.kod_agama', 'la.kod_agama')
                ->leftJoin('public.l_taraf_perkahwinan as ltp', 'p.kod_taraf_perkahwinan', 'ltp.kod_taraf_perkahwinan')
                ->leftJoin('public.l_bangsa as lb', 'p.kod_bangsa', 'lb.kod_bangsa')
                ->leftJoin('public.l_negeri as ln2', 'p.kod_negeri_lahir', 'ln2.kod_negeri')
                ->select('p.*','la.agama','ltp.taraf_perkahwinan', 'lb.bangsa', 'ln2.negeri as negeri_lahir')
                ->where('p.nokp',$nokp)->first();

        $newuser = new User;

        // if($id) {
        //     $newuser = User::find($id);
        // }

        // $newuser->name = $mykjPeribadi->nama;
        // $newuser->nokp = $mykjPeribadi->nokp;
        // $newuser->email = $mykjPeribadi->email;
        // $newuser->password = Hash::make('P@ssw0rD');
        // $newuser->created_by = '';
        // $newuser->type = 1;
        // $newuser->flag = 1;
        // $newuser->delete_id = 0;

        // $newuser->save();

        // if(empty($newuser->id)) {
        //     Peribadi::create($newuser->id,$mykjPeribadi);
        // }

        // return $newuser;

        return $mykjPeribadi;
    }

    public static function register($nokp,$password,$type) {
        $user = NULL;

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
                if(empty($user->user_roles)){
                    DB::table('role_user')->insert([
                        'role_id' => 2,
                        'user_id' => $user->id,
                        'user_type' => 'App\Models\User',
                    ]);
                }
                Penempatan::recreate($user->id,$user->nokp);
            } else {
                if($mykjPeribadi) {
                    $user = new User;

                    $user->name = $mykjPeribadi->nama;
                    $user->nokp = $mykjPeribadi->nokp;
                    $user->email = $mykjPeribadi->email;
                    $user->password = Hash::make($password);
                    $user->created_by = 'MYKJ';
                    $user->type = 1;
                    $user->flag = 1;
                    $user->delete_id = 0;

                    if($user->save()) {
                        // create user peribadi
                        Peribadi::create($user->id,$mykjPeribadi);
                        Penempatan::recreate($user->id,$user->nokp);
                        DB::table('role_user')->insert([
                            'role_id' => 2,
                            'user_id' => $user->id,
                            'user_type' => 'App\Models\User',
                        ]);
                    }
                }
            }
        }

        return $user;
    }
}
