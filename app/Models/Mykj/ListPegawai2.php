<?php

namespace App\Models\Mykj;
use App\Models\Mykj\LWaranPej;
use App\Models\Mykj\Pengalaman;
use App\Models\Mykj\Kelayakan;
use App\Models\Mykj\Perkhidmatan;
use App\Models\Mykj\Peribadi;
use App\Models\Mykj\Markah;
use App\Models\Mykj\Peristiwa;
use App\Models\Pink\LampiranBebanKerja;
use App\Models\Pink\Resume;


use DateTime;

use Illuminate\Database\Eloquent\Model;

class ListPegawai2 extends Model
{

    protected $connection = 'pgsqlmykj';
    protected $table = 'list_pegawai2';
//    public $timestamps = false;

    public function getPerkhidmatan(){
        return $this->hasOne(Perkhidmatan::class, 'nokp', 'nokp')->where('flag',1)->orderBy('id_perkhidmatan', 'desc');
    }

    public function getLampiran(){
        return $this->hasOne(LampiranBebanKerja::class, 'nokp', 'nokp')->orderBy('id', 'desc');
    }


    public function getResume(){
        return $this->hasOne(Resume::class, 'nokp', 'nokp')->where('status',1)->orderBy('id', 'desc');
    }

    public static function getMaklumatPegawaiRingkas(Int $no_ic) : array {
        $data = [];
        $maklumatPegawaiGet = ListPegawai2::where('nokp', $no_ic)->first();

        if($maklumatPegawaiGet) {
            $maklumatPegawai = $maklumatPegawaiGet;

            $data['nokp'] = $no_ic;
            $data['gelaran'] = $maklumatPegawai->gelaran;
            $data['name'] = html_entity_decode($maklumatPegawai->nama, ENT_QUOTES | ENT_HTML5);
            $data['tel_bimbit'] = $maklumatPegawai->tel_bimbit;
            $data['tel_pejabat'] = $maklumatPegawai->tel_pejabat;
            $data['alamat_pejabat'] = $maklumatPegawai->alamat_pejabat;
            $data['gred'] = $maklumatPegawai->kod_gred;
            $data['email'] = $maklumatPegawai->email;
            $data['jawatan'] = $maklumatPegawai->jawatan;
            $data['waran_split'] = ListPegawai2::split_kod_waran($maklumatPegawai->kod_waran);
            $data['waran_name'] = ListPegawai2::split_kod_waran_name($data['waran_split']);
            $data['peribadi'] = ListPegawai2::peribadi($no_ic);
        }

        return $data;
    }

    public static function getMaklumatPegawai(Int $no_ic) : array{
        $data = [];
        $maklumatPegawaiGet = ListPegawai2::where('nokp', $no_ic)->first();

        if($maklumatPegawaiGet) {
            $maklumatPegawai = $maklumatPegawaiGet;

            $data['nokp'] = $no_ic;
            $data['gelaran'] = $maklumatPegawai->gelaran;
            $data['name'] = html_entity_decode($maklumatPegawai->nama, ENT_QUOTES | ENT_HTML5);
            $data['tel_bimbit'] = $maklumatPegawai->tel_bimbit;
            $data['tel_pejabat'] = $maklumatPegawai->tel_pejabat;
            $data['alamat_pejabat'] = $maklumatPegawai->alamat_pejabat;
            $data['gred'] = $maklumatPegawai->kod_gred;
            $data['email'] = $maklumatPegawai->email;
            $data['jawatan'] = $maklumatPegawai->jawatan;
            $data['waran_split'] = ListPegawai2::split_kod_waran($maklumatPegawai->kod_waran);
            $data['waran_name'] = ListPegawai2::split_kod_waran_name($data['waran_split']);
            $data['pengalaman'] = ListPegawai2::pengalaman($no_ic);
            $data['kelayakan'] = ListPegawai2::kelayakan($no_ic);
            $data['tempatan'] = ListPegawai2::tempatan($no_ic);
            $data['antarabangsa'] = ListPegawai2::antarabangsa($no_ic);
            $data['perkhidmatan'] = ListPegawai2::perkhidmatan($no_ic);
            $data['peribadi'] = ListPegawai2::peribadi($no_ic);
            $data['markah'] = ListPegawai2::markah($no_ic);
            $data['professional'] = ListPegawai2::professional($no_ic);
            $data['jurnal'] = ListPegawai2::jurnal($no_ic);
            $data['jawatanKuasateknikal'] = ListPegawai2::jawatanKuasateknikal($no_ic);
            $data['dalamTugasrasmi'] = ListPegawai2::dalamTugasrasmi($no_ic);
            $data['luarTugasrasmi'] = ListPegawai2::luarTugasrasmi($no_ic);
            $data['aPC'] = ListPegawai2::aPC($no_ic);
            $data['pingat'] = ListPegawai2::pingat($no_ic);
            $data['anugerahUmum'] = ListPegawai2::anugerahUmum($no_ic);
            $data['isytiharHarta'] = ListPegawai2::isytiharHarta($no_ic);
            $data['pengalamanPengkhususan'] = ListPegawai2::pengalamanPengkhususan($no_ic);
        }

        return $data;
    }

     public static function kelayakan($ic){
        $data= [];

        $model = Kelayakan::where('nokp', $ic)->whereNotIn('kod_kelulusan',[8,9,10,20,21,22,23])->get();

        if($model){
            foreach($model as $m){
                $data[] = [
                    'nama_kelulusan' => $m->nama_kelulusan,
                    'institusi' => $m->institusi,
                    'tkh_kelulusan' => $m->tkh_kelulusan ?  $m->tkh_kelulusan : ''
                ];
            }
        }

        return $data;
    }


    public static function professional($ic){
        $data= [];

        $model = Kelayakan::where('nokp', $ic)->where('kod_kelulusan', '=',[8])->get();

        if($model){
            foreach($model as $m){
                $data[] = [
                    'kod_gred' => $m->kod_gred,
                    'kod_jawatan' => $m->kod_jawatan,
                    'taraf'=> $m->PerkhidmatanTaraf ?$m->PerkhidmatanTaraf->perkhidmatan:'',
                    // 'skim' => $m->LKumpulan->kumpulan ? $m->LKumpulan->kumpulan : '',
                    'gred_hakiki' =>$m->kod_gred,
                    'tkh_mula_gred_hakiki' =>$m->tkh_lantik ? $m->tkh_lantik:'',
                    'nama_kelulusan' => $m->nama_kelulusan,
                    'institusi' => $m->institusi,
                     'no_daftar' => $m->no_pendaftaran,
                    'tkh_kelulusan' => $m->tkh_kelulusan ? $m->tkh_kelulusan :''
                ];
            }
        }

        return $data;
    }

 public static function tempatan($ic){
        $data= [];

        $model = Kelayakan::where('nokp', $ic)->where('kod_kelulusan', '=',[9])->get();

        if($model){
            foreach($model as $m){
                $data[] = [
                    'kod_gred' => $m->kod_gred,
                    'kod_jawatan' => $m->kod_jawatan,
                    'taraf'=> $m->PerkhidmatanTaraf ?$m->PerkhidmatanTaraf->perkhidmatan:'',
                    // 'skim' => $m->LKumpulan->kumpulan ? $m->LKumpulan->kumpulan : '',
                    'gred_hakiki' =>$m->kod_gred,
                    'tkh_mula_gred_hakiki' =>$m->tkh_lantik ? $m->tkh_lantik:'',
                    'nama_kelulusan' => $m->nama_kelulusan,
                    'institusi' => $m->institusi,
                     'no_daftar' => $m->no_pendaftaran,
                    'tkh_kelulusan' => $m->tkh_kelulusan ? $m->tkh_kelulusan :''
                ];
            }
        }

        return $data;
    }
 public static function antarabangsa($ic){
        $data= [];

        $model = Kelayakan::where('nokp', $ic)->where('kod_kelulusan', '=',[10])->get();

        if($model){
            foreach($model as $m){
                $data[] = [
                    'kod_gred' => $m->kod_gred,
                    'kod_jawatan' => $m->kod_jawatan,
                    'taraf'=> $m->PerkhidmatanTaraf ?$m->PerkhidmatanTaraf->perkhidmatan:'',
                    // 'skim' => $m->LKumpulan->kumpulan ? $m->LKumpulan->kumpulan : '',
                    'gred_hakiki' =>$m->kod_gred,
                    'tkh_mula_gred_hakiki' =>$m->tkh_lantik ? $m->tkh_lantik:'',
                    'nama_kelulusan' => $m->nama_kelulusan,
                    'institusi' => $m->institusi,
                     'no_daftar' => $m->no_pendaftaran,
                    'tkh_kelulusan' => $m->tkh_kelulusan ? $m->tkh_kelulusan :''
                ];
            }
        }

        return $data;
    }


   public static function isytiharHarta($ic){
        $data= [];

        $model = Peristiwa::where('nokp', $ic)->where('kod_peristiwa','=','L8')->orderBy('tkh_mula_peristiwa', 'desc')->first();


         if($model){
            $data = [
                'kod_peristiwa' => $model->LPeristiwa->peristiwa,
                'tkh_mula_peristiwa' => $model->tkh_mula_peristiwa  ?  $model->tkh_mula_peristiwa : ''
            ];
        }

        return $data;
    }

    public static function aPC($ic){
        $data= [];

        $model = Peristiwa::where('nokp', $ic)->where('kod_peristiwa','=','A1')->get();

        if($model){
            foreach($model as $m){
                $data[] = [
                    'kod_peristiwa' => $m->LPeristiwa->peristiwa,
                    'tkh_mula_peristiwa' => $m->tkh_mula_peristiwa ?  $m->tkh_mula_peristiwa:''
                ];
            }
        }

        return $data;
    }

    public static function pingat($ic){
        $data= [];

        $model = Peristiwa::where('nokp', $ic)->where('kod_peristiwa','=','P8')->get();

        if($model){
            foreach($model as $m){
                $data[] = [
                    'kod_peristiwa' => $m->LPeristiwa->peristiwa ?  $m->LPeristiwa->peristiwa : '',
                    'tkh_mula_peristiwa' => $m->tkh_mula_peristiwa ? $m->tkh_mula_peristiwa : ''
                ];
            }
        }

        return $data;
    }

    public static function anugerahUmum($ic){
        $data= [];

        $model = Peristiwa::where('nokp', $ic)->where('kod_peristiwa','=','A4')->get();

        if($model){
            foreach($model as $m){
                $data[] = [
                   'kod_peristiwa' => $m->LAktiviti ? ($m->LAktiviti->peristiwa ? $m->LAktiviti->peristiwa : '') :'',
                    'tkh_mula_peristiwa' => $m->tkh_mula_peristiwa ? $m->tkh_mula_peristiwa :''
                ];
            }
        }

        return $data;
    }

     public static function luarTugasrasmi($ic){
        $data= [];

        $model = Kelayakan::where('nokp', $ic)->where('kod_kelulusan','=','23')->get();

        if($model){
            foreach($model as $m){
                $data[] = [
                    'nama_kelulusan' => $m->nama_kelulusan,
                    'institusi' => $m->institusi,
                    'tkh_kelulusan' => $m->tkh_kelulusan ? $m->tkh_kelulusan : ''
                ];
            }
        }

        return $data;
    }

    public static function dalamTugasrasmi($ic){
        $data= [];

        $model = Kelayakan::where('nokp', $ic)->where('kod_kelulusan','=','22')->get();

        if($model){
            foreach($model as $m){
                $data[] = [
                    'nama_kelulusan' => $m->nama_kelulusan,
                    'institusi' => $m->institusi,
                    'tkh_kelulusan' => $m->tkh_kelulusan ? $m->tkh_kelulusan :''
                ];
            }
        }

        return $data;
    }

    public static function jawatanKuasateknikal($ic){
        $data= [];

        $model = Kelayakan::where('nokp', $ic)->where('kod_kelulusan','=','21')->get();

        if($model){
            foreach($model as $m){
                $data[] = [
                    'nama_kelulusan' => $m->nama_kelulusan,
                    'institusi' => $m->institusi,
                    'tkh_kelulusan' => $m->tkh_kelulusan ? $m->tkh_kelulusan :''
                ];
            }
        }

        return $data;
    }

    public static function jurnal($ic){
        $data= [];

        $model = Kelayakan::where('nokp', $ic)->where('kod_kelulusan','=','20')->get();

        if($model){
            foreach($model as $m){
                $data[] = [
                    'nama_kelulusan' => $m->nama_kelulusan,
                    'institusi' => $m->institusi,
                    'tkh_kelulusan' => $m->tkh_kelulusan ? $m->tkh_kelulusan :''
                ];
            }
        }

        return $data;
    }



    public static function markah($ic){
        $data= [];


        $model = Markah::where('nokp', $ic)->orderBy('tahun', 'desc')->limit(3)->get();

        if($model){
            foreach($model as $m){
                $data[] = [
                    'tahun' => $m->tahun ? $m->tahun : "tiada rekod",
                    'purata' => $m->purata
                ];
            }
        }

        return $data;
    }

    public static function pengalaman($ic){
        $data= [];
        //$days='';

        $model = Pengalaman::where('nokp', $ic)->where('kod_aktiviti','>=', [50])->groupBy('id_pengalaman','kod_aktiviti')->distinct()->orderBy('kod_aktiviti')->get();

        if($model){
            foreach($model as $m){


                $data[] = [
//                     $datetime1 = new DateTime($m->tkh_mula);
// $datetime2 = new DateTime($m->tkh_tamat);
// $interval = $datetime1->diff($datetime2);
// $days = $interval->format('%a');
                    'tempat' => $m->tempat,
                    'mula' => $m->tkh_mula ? $m->tkh_mula:'',
                    'tamat' => $m->tkh_tamat ? $m->tkh_tamat:'',
                    'aktiviti' => $m->LAktiviti->aktiviti,
                    'kod_aktiviti' => $m->kod_aktiviti,
                    'kod_gred_sebenar' => $m->kod_gred_sebenar,
                    'kod_gelaran_jawatan' => empty($m->gelaran_jawatan)? '' : $m->gelaran_jawatan->gelaran_jawatan

                ];
            }
        }

        return $data;
    }

    public static function pengalamanPengkhususan($ic){
        $data= [];

        $model = Pengalaman::where('nokp', $ic)->where('kod_aktiviti','>=', [50])->groupBy('id_pengalaman','kod_aktiviti')->orderBy('kod_aktiviti')->get();

        // $model = Pengalaman::where('nokp', $ic)->where('kod_aktiviti','>=', [50])->distinct('kod_aktiviti')->orderBy('kod_aktiviti')->get();

        // $tkh_awal = Pengalaman::where
        if($model){
            foreach($model as $m){
                // $diff=date_diff($m->tkh_mula,$m->tkh_tamat);
                if($m->kod_aktiviti >= 50){
                    if($m->tkh_mula && $m->tkh_tamat){
                        $date1 = new DateTime($m->tkh_mula);
                        $date2 = new DateTime($m->tkh_tamat);
                        $interval = $date1->diff($date2);
                    }else{
                        $interval = '';
                    }


                    $data['khusus'][$m->LAktiviti->aktiviti]['data'][] = [
                        'tempat' => $m->tempat,
                        'interval_month' => empty($interval) ? '' : $interval->m,
                        'interval_year' => empty($interval) ? '' : $interval->y,
                        // 'diff' => $diff->format("%R%a days"),
                        'aktiviti' => $m->LAktiviti->aktiviti,
                        'kod_gred_sebenar' => $m->kod_gred_sebenar,
                        'kod_gelaran_jawatan' => $m->gelaran_jawatan->gelaran_jawatan ? $m->gelaran_jawatan->gelaran_jawatan:'',
                        'kod_aktiviti' => $m->kod_aktiviti

                    ];
                }

            }
        }


        if(isset($data['khusus'])){
            foreach ($data['khusus'] as $key => $value) {
                $title = $key;
                if(count($value['data']) > 0){
                    $totalYear = 0;
                    $totalMonth = 0;
                    foreach($value['data'] as $v){
                        if(is_numeric($v['interval_month'])) {
                            $totalMonth += $v['interval_month'];
                        }
                        if(is_numeric($v['interval_year'])) {
                            $totalYear += $v['interval_year'];
                        }
                    }

                    if($totalMonth >= 12){
                        while($totalMonth >= 12){
                            $totalMonth= $totalMonth - 12;
                            $totalYear += 1;
                        }
                    }

                    $data['khusus'][$key]['jumlah_pengalaman'] = $title.' selama '.$totalYear.' tahun, '.$totalMonth.' bulan';
                }

            }
        }



        return $data;
    }







    public static function perkhidmatan($ic){
        $data= [];

        $model = Perkhidmatan::where('nokp', $ic)->where('kod_kumpulan',3)->orderBy('tkh_lantik', 'desc')->first();

        if($model){
                $data = [
                    'kod_gred' => $model->kod_gred,
                    'kod_jawatan' => $model->kod_jawatan,
                    'taraf'=> $model->PerkhidmatanTaraf->perkhidmatan,
                    'skim' =>  $model->LKumpulan->kumpulan ? $model->LKumpulan->kumpulan : '',
                    'gred_sekarang' =>$model->kod_gred,
                    'tkh_mula_gred_sekarang' =>$model->tkh_lantik ? $model->tkh_lantik :''
                ];
            }


        return $data;
    }

    public static function peribadi($ic){
        $data=[];

        $model = Peribadi::where('nokp', $ic)->first();

         if($model){
            $data = [
                'tkh_lahir' => $model->tkh_lahir,
                'tempat_lahir' => $model->Lnegeri ? $model->Lnegeri->negeri : '',
                'alamat_rumah'=> $model->alamat,
                'taraf_perkahwinan' => $model->LTarafPerkahwinan ? $model->LTarafPerkahwinan->taraf_perkahwinan : '',
                'no_fax' => $model->fax_pejabat,
                'tel_bimbit' => $model->tel_bimbit,
                'gambar' => $model->gambar,
                'tkh_wajib_bersara' => $model->tkh_bersara ? $model->tkh_bersara:''

            ];
        }

        return $data;

    }

    public static function split_kod_waran($kod_waran){
        $data['sektor'] = substr($kod_waran, 0, 2).'0000000000';
        $data['cawangan'] = substr($kod_waran, 0, 4).'00000000';
        $data['bahagian'] = substr($kod_waran, 0, 6).'000000';
        $data['unit'] = substr($kod_waran, 0, 8).'0000';
        $data['waran_penuh'] = $kod_waran;

        return $data;
    }

    public static function split_kod_waran_name($waran_split_arr) : array{
        $data = [];

        foreach ($waran_split_arr as $name => $waran){
            $penempatan_name = LWaranPej::where('kod_waran_pej', $waran)->where('ref_id', 0)->where('flag', 1)->first();
            $data[$name] = $penempatan_name ? $penempatan_name->waran_pej : 'Tiada Info Penempatan';
        }

        return $data;
    }

    public static function getWaranName($kod_waran) : String{
        $model = LWaranPej::where('kod_waran_pej', $kod_waran)->where('ref_id', 0)->where('flag', 1)->first();
        return $model ? $model->waran_pej : 'Tiada Info Penempatan';
    }

    public static function getMaklumatPegawaiTanpaWaran($no_ic){
        $maklumatPegawai = ListPegawai2::where('nokp', $no_ic)->first();

        if($maklumatPegawai){
            $data['nokp'] = $no_ic;
            $data['name'] = $maklumatPegawai->nama ?? '';
            $data['tel_bimbit'] = $maklumatPegawai->tel_bimbit ?? 'Tiada Telefon Bimbit';
            $data['tel_pejabat'] = $maklumatPegawai->tel_pejabat ?? 'Tiada Telefon Pejabat';
            $data['alamat_pejabat'] = $maklumatPegawai->alamat_pejabat ?? 'Tiada Alamat';
            $data['gred'] = $maklumatPegawai->kod_gred ?? 'Tiada Gred';
            $data['email'] = $maklumatPegawai->email ?? 'Tiada Emel';
            $data['jawatan'] = $maklumatPegawai->jawatan ?? 'Tiada Jawatan';
        }
        return $data;
    }
}
