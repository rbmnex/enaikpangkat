<?php

namespace App\Http\Controllers\Urussetia;

use App\Http\Controllers\Common\CommonController;
use App\Http\Controllers\Controller;
use App\Models\Admin\AuditTrail;
use App\Models\Mykj\LGred;
use App\Models\Mykj\ListPegawai2;
use App\Models\Mykj\LJurusan;
use App\Models\Pink\Resume;
use App\Models\Resume\BatchResume;
use App\Models\Resume\ResumeMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\DataTables;

class BatchResumeController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function viewBatch(Request $request) {
        $jurusan = LJurusan::all();
        $gred = LGred::all();
        return view('urussetia.resume.batch',['jurusan' => $jurusan, 'gred' => $gred]);
    }

    public function loadBatch(Request $request) {
        $model = BatchResume::where('flag',1)->where('delete_id',0)->orderBy('created_at','desc')->get();
        return DataTables::of($model)
        ->setRowAttr([
            'data-batch-id' => function($data) {
                return $data->id;
            }
        ])
        ->addColumn('send_date',function($data) {
            if($data->tkh_hantar) {
                return Date::parse($data->tkh_hantar)->format('d-m-Y');
            } else {
                return '00-00-0000';
            }
        })
        ->rawColumns(['aksi'])
        ->make(true);

    }

    public function searchPegawai(Request $request) {
        $jurusan = $request->input('jurusan');
        $gred = $request->input('gred');

        $model = new ListPegawai2;

        if($jurusan) {
            $model = $model->where('kod_jurusan',$jurusan);
        }

        if($gred) {
            $model = $model->where('kod_gred',$gred);
        }

        return DataTables::of($model->get())
        ->addColumn('displin',function($data) {
            if($data->kod_jurusan) {
                $q = LJurusan::where('kod_jurusan',$data->kod_jurusan)->first();
                if($q) {
                    return $q->jurusan;
                } else {
                    return '';
                }
            } else {
                return '';
            }
        })
        ->make(true);
    }

    public function addBatch(Request $request) {
        $nama = $request->input('nama');
        $staff_list = json_decode($request->input('nokps'));

        $main =  new BatchResume();

        $audit = new AuditTrail();
        $audit->setInitialObj($main);

        $main->nama = $nama;
        $main->status = 'new';
        $main->flag = 1;
        $main->delete_id = 0;
        $main->created_by = Auth::user()->nokp;
        $main->updated_by = Auth::user()->nokp;

        if($main->save()) {
            $audit->setModifyObj($main);
            $audit->capture(Auth::user()->nokp,"SAVE_BATCH","RESUME");
            foreach($staff_list as $nokp) {
                $info = ListPegawai2::where('nokp',$nokp)->first();
                $member =  new ResumeMember();
                $member->nama = $info->nama;
                $member->nokp = $nokp;
                $member->email = $info->email;
                $member->flag = 1;
                $member->delete_id = 0;
                $member->status = 'new';
                $member->id_kump = $main->id;
                $member->gred = $info->kod_gred;
                $member->jawatan = $info->jawatan;
                $member->jurusan = $info->kod_jurusan;
                $member->created_by = Auth::user()->nokp;
                $member->updated_by = Auth::user()->nokp;

                $member->save();
            }

            return response()->json([
                'success' => 1,
                'data' => []
            ]);
        } else {
            return response()->json([
                'success' => 0,
                'data' => []
            ]);
        }
    }

    public function deleteBatch(Request $request) {
        $batchId = $request->input('batch_id');
        $model = BatchResume::find($batchId);
        $audit = new AuditTrail();
        $audit->setInitialObj($model);
        if($model) {
            $model->flag = 0;
            $model->delete_id = 1;
            $model->updated_by = Auth::user()->nokp;

            if($model->save()) {
                $audit->setModifyObj($model);
                $audit->capture(Auth::user()->nokp,"DELETE_BATCH","RESUME");
                return response()->json([
                    'success' => 1,
                    'data' => []
                ]);
            } else {
                return response()->json([
                    'success' => 0,
                    'data' => []
                ]);
            }
        } else {
            return response()->json([
                'success' => 0,
                'data' => []
            ]);
        }
    }

    public function viewMember($id) {
        return view('urussetia.resume.member', ['id' => $id]);
    }

    public function loadMember($id) {
        $model = ResumeMember::where('id_kump',$id)->where('flag',1)->where('delete_id',0)->orderBy('created_at','desc')->get();
        return DataTables::of($model)
        ->setRowAttr([
            'data-member-id' => function($data) {
                return $data->id;
            }
        ])
        ->addColumn('send_date',function($data) {
            if($data->tkh_hantar) {
                return Date::parse($data->tkh_hantar)->format('d-m-Y');
            } else {
                return '00-00-0000';
            }
        })
        ->addColumn('displin', function($data) {
            if($data->jurusan) {
                $q = LJurusan::where('kod_jurusan',$data->jurusan)->first();
                if($q) {
                    return $q->jurusan;
                } else {
                    return '';
                }
            } else {
                return '';
            }
        })
        ->rawColumns(['aksi'])
        ->make(true);
    }

    public function searchSingle(Request $request) {
        $data = [];
        $search_term = $request->input('q');
        $peribadi = DB::connection('pgsqlmykj')->table('list_pegawai2 as np')
        ->leftJoin('l_jurusan as lj','np.kod_jurusan','lj.kod_jurusan')
        ->select('np.nokp','np.nama','np.kod_gred','np.jawatan','lj.jurusan')->where('np.nokp', 'ilike', '%'.$search_term.'%')
            ->orWhereRaw("LOWER(np.nama) ilike '%".$search_term."%'")->limit(20)->get();

        if(count($peribadi) != 0){
            foreach($peribadi as $p){
                $data[] = array(
                    'id' => $p->nokp,
                    'text' => $p->nama.' - '.$p->nokp.' - '.$p->jawatan.' - '.$p->kod_gred.' - '.$p->jurusan
                );
            }
        }

        return response()->json([
            'data' => $data
        ]);
    }

    public function infoPegawai($nokp) {
        $info = DB::connection('pgsqlmykj')->table('list_pegawai2 as np')
        ->leftJoin('l_jurusan as lj','np.kod_jurusan','lj.kod_jurusan')
        ->select('np.nokp','np.nama','np.kod_gred','np.jawatan','lj.jurusan','lj.kod_jurusan','np.email')->where('np.nokp', $nokp)->first();
        if($info) {
            return response()->json([
                'success' => 1,
                'data' => [
                    'nama' => $info->nama,
                    'nokp' => $info->nokp,
                    'gred' => $info->kod_gred,
                    'jawatan' => $info->jawatan,
                    'jurusan' => $info->jurusan,
                    'kod_jurusan' => $info->kod_jurusan,
                    'email' => $info->email
                ]
            ]);
        } else {
            return response()->json([
                'success' => 0,
                'data' => [
                    'nama' => '',
                    'nokp' => '',
                    'gred' => '',
                    'jawatan' => '',
                    'jurusan' => '',
                    'kod_jurusan' => '',
                    'email' => ''
                ]
            ]);
        }
    }

    public function addSingle(Request $request) {
        $batchId = $request->input('batch_id');
        $nokp = $request->input('nokp');
        $nama = $request->input('nama');
        $jawatan = $request->input('jawatan');
        $gred = $request->input('gred');
        $kodJurusan = $request->input('kod_jurusan');
        $email = $request->input('email');

        $model = new ResumeMember();
        $audit = new AuditTrail();
        $audit->setInitialObj($model);

        $model->nama = $nama;
        $model->nokp = $nokp;
        $model->email = $email;
        $model->status = 'new';
        $model->flag = 1;
        $model->delete_id = 0;
        $model->id_kump = $batchId;
        $model->created_by = Auth::user()->nokp;
        $model->updated_by = Auth::user()->nokp;
        $model->gred = $gred;
        $model->jawatan = $jawatan;
        $model->jurusan = $kodJurusan;

        if($model->save()) {
            $audit->setModifyObj($model);
            $audit->capture(Auth::user()->nokp,"ADD_SINGLE_OFFICER","RESUME");
            return response()->json([
                'success' => 1,
                'data' => []
            ]);
        } else {
            return response()->json([
                'success' => 0,
                'data' => []
            ]);
        }
    }

    public function deleteMember(Request $request) {
        $memberId = $request->input('member_id');
        $model = ResumeMember::find($memberId);
        $audit = new AuditTrail();
        $audit->setInitialObj($model);

        if($model) {
             $model->flag = 0;
             $model->delete_id = 1;
             $model->updated_by = Auth::user()->nokp;
             if($model->save()) {
                $audit->setModifyObj($model);
                $audit->capture(Auth::user()->nokp,"DELETE_OFFICER","RESUME");
                return response()->json([
                    'success' => 1,
                    'data' => []
                ]);
             } else {
                return response()->json([
                    'success' => 0,
                    'data' => []
                ]);
             }
        } else {
            return response()->json([
                'success' => 0,
                'data' => []
            ]);
        }
    }

    public function sendAll(Request $request) {
        $batchId = $request->input('batch_id');
        $model = BatchResume::find($batchId);
        $ctrl = new ResumeController();
        if($model->members) {
            foreach($model->members as $member) {
                if($member->delete_id == 0 && !empty($member->tkh_hantar)) {
                    if($this->sendMail($member)) {
                        $member->tkh_hantar = Date::now();
                        $member->status = 'sent';
                        $member->updated_by = Auth::user()->nokp;
                        $member->save();
                    }
                }
            }
            $model->tkh_hantar = Date::now();
            $model->status = 'complete';
            $model->updated_by = Auth::user()->nokp;
            if($model->save()) {
                return response()->json([
                    'success' => 1,
                    'data' => []
                ]);
            } else {
                return response()->json([
                    'success' => 0,
                    'data' => []
                ]);
            }
        } else {
            return response()->json([
                'success' => 0,
                'data' => []
            ]);
        }
    }

    public function sendSingle(Request $request) {
        $memberId = $request->input('member_id');
        $model = ResumeMember::find($memberId);
        if($model) {
            if($model->delete_id == 0 && !empty($model->tkh_hantar)) {
                if($this->sendMail($model)) {
                    $model->tkh_hantar = Date::now();
                    $model->status = 'sent';
                    $model->updated_by = Auth::user()->nokp;
                    if($model->save()) {
                        return response()->json([
                            'success' => 1,
                            'data' => []
                        ]);
                    } else {
                        return response()->json([
                            'success' => 0,
                            'data' => []
                        ]);
                    }
                } else {
                    return response()->json([
                        'success' => 0,
                        'data' => []
                    ]);
                }
            }
        } else {
            return response()->json([
                'success' => 0,
                'data' => []
            ]);
        }
    }

    private function sendMail($obj) {
        $common = new CommonController();
                $dateline = $common->calc_DateOnWorkingDays(5);

                $content = [
                    'link' => url('user/resume/lampiran'),
                    'date' => $common->translateMonth($dateline->format('d M Y'))
                ];

                Mail::mailer('smtp')->send('mail.lampiran-mail', $content, function ($message) use ($obj) {
                    // testing purpose
                    $message->to($obj->email, $obj->nama);
                    $message->subject('KEMASKINI RESUME');
                    $message->from('eHR@jkr.gov.my', 'Sistem ENP');
                });

                if(Mail::failures()) {
                    return false;
                } else {
                    $model = Resume::where('nokp', $obj->nokp)->first();
                    if(empty($model)) {
                        $model = new Resume();
                        $model->created_by = Auth::user()->nokp;
                    }
                    $model->flag = 1;
                    $model->status = 1;
                    $model->nokp = $obj->nokp;
                    $model->nama = $obj->nama;
                    $model->kod_gred = $obj->gred;
                    $model->jawatan = $obj->jawatan;
                    $model->updated_by = Auth::user()->nokp;
                    $model->save();
                    return true;
                }


    }
}
