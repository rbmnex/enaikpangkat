<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profail\Peribadi;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use App\Models\Mykj\ListPegawai2;
use Codedge\Fpdf\Fpdf\Fpdf;

class UserMgmtController extends Controller
{


    public function index(Request $request) {
        $model = Role::all();
        return view('admin.user.usermgmt')->with('roles',$model);
    }

    public function senarai_pengguna(Request $request) {
        $model = DB::connection('pgsql')->table('users as ur')
            ->leftJoin('peribadi as pr','pr.users_id', 'ur.id')
            ->leftJoin('penempatan as pp', 'pp.id_peribadi', 'pr.id')
            ->select('ur.name','ur.nokp','pp.jawatan','pp.unit','pp.bahagian','pp.cawangan','pp.pejabat', 'ur.email','ur.id as user_id', 'pr.id as peribadi_id', 'pp.id as penempatan_id', 'ur.flag')
            ->where('ur.type', 1)
            ->get();

            return DataTables::of($model)
                ->setRowAttr([
                    'data-user-id' => function($data) {
                        return $data->user_id;
                    },
                    'data-peribadi-id' => function($data) {
                        return $data->peribadi_id;
                    },
                    'data-nokp' => function($data) {
                        return $data->nokp;
                    }
                ])
                ->addColumn('lokasi', function($data) {
                    return strtoupper($data->unit).", ".strtoupper($data->bahagian).", ".strtoupper($data->cawangan).", ".strtoupper($data->pejabat);
                })
                ->rawColumns(['aktif','aksi'])
                ->make(true);
    }

    public function carian_pengguna(Request $request){
        $data = [];
        $search_term = $request->input('q');
        $peribadi = DB::connection('pgsqlmykj')->table('list_pegawai2 as p')->select('p.*')->where('nokp', 'ilike', '%'.$search_term.'%')
            ->orWhereRaw("LOWER(nama) ilike '%".$search_term."%'")->limit(20)->get();

        if(count($peribadi) != 0){
            foreach($peribadi as $p){
                $data[] = array(
                    'id' => $p->nokp,
                    'text' => $p->nama.' - '.$p->nokp
                );
            }
        }

        return response()->json([
            'data' => $data
        ]);
    }

    public function maklumat_pengguna(Request $request) {
        $nokp = $request->input('no_ic');
        $user = DB::connection('pgsql')->table('users as ur')
        ->leftJoin('peribadi as pr','pr.users_id', 'ur.id')
        ->leftJoin('penempatan as pp', 'pp.id_peribadi', 'pr.id')
        ->select('ur.name','ur.nokp','pp.jawatan','pp.unit','pp.bahagian','pp.cawangan','pp.pejabat', 'ur.email','ur.id as user_id', 'pr.id as peribadi_id', 'pp.id as penempatan_id', 'ur.flag')
        ->where('ur.nokp', $nokp)
        ->first();

        if($user) {
            $info = array();
            $info['user_id'] = $user->user_id;
            $info['nokp'] = $user->nokp;
            $info['nama'] = $user->name;
            $info['jawatan'] = $user->jawatan;
            $info['emel'] = $user->email;
            $info['unit'] = $user->unit;
            $info['bahagian'] = $user->bahagian;

            $info['cawangan'] = $user->cawangan;
            $info['pejabat'] = $user->pejabat;

            $roles = Role::user_roles_list($user->user_id);

            return response()->json([
                'data' => $info,
                'roles' => $roles,
            ]);
        } else {
            $info = Peribadi::info_pengguna($nokp);

            return response()->json([
                'data' => $info
            ]);
        }
    }

    public function save_pengguna(Request $request) {
        $roleArr = json_decode($request->input('roles'));
        $ops = $request->input('ops');
        $nokp = $request->input('nokp');
        $userid = $request->input('userid');

        if($ops) {
            // update
            RoleUser::where('user_id', $userid)->delete();
            $model = User::upsert($nokp,$userid);
        } else {
            // insert
            $model = User::upsert($nokp);
            $userid = $model->id;
        }

        foreach($roleArr as $r){
            $newQuery = new RoleUser;
            $newQuery->user_id = $userid;
            $newQuery->role_id = $r;
            $newQuery->user_type = 'Staff';
            $newQuery->save();
        }

        return response()->json([
            'success' => 1,
            'data' => [
                'ops' => $ops
            ]
        ]);
    }

    public function mockup2(){
        return view('mockup2');
    }
    public function mockup3(){
        return view('mockup3');
    }
    public function mockup1(){
        return view('mockup1');
    }
}
