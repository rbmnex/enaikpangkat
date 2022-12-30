<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Models\Mykj\ListPegawai2;
use App\Models\Tetapan\Bangunan;
use App\Models\Urussetia\Holidays as UrussetiaHolidays;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CommonController extends Controller
{
    public static function errorResponse($message){
        return response()->json($message)->setStatusCode(500)->header('Content-Type', 'application/json');
    }

    public static function dateAugment($date, $reverse = false){
        return date($reverse ? 'd-m-Y' : 'Y-m-d', strtotime($date) );
    }

    public static function get_profile(){

        $profile = Auth::user()->userProfile;

        $data['first_name'] = $profile->first_name ?? null;
        $data['last_name'] = $profile->last_name ?? null;
        $data['ic_no'] = $profile->ic_no ?? null;
        $data['genders_id'] = $profile->genders_id ?? null;
        $data['dob'] = isset($profile->dob) ? self::dateAugment($profile->dob, true) : null;
        $data['sob_id'] = $profile->sob_id ?? null;
        $data['cob_id'] = $profile->cob_id ?? null;
        $data['marital_statuses'] = $profile->marital_statuses_id ?? null;

        return response()->json([
            'success' => 1,
            'data' => $data
        ]);
    }

    public static function upload_image($photo, $folder){
        $filename = $photo->getClientOriginalName();
        $extension = $photo->getClientOriginalExtension();
        $image = str_replace(' ', '+', $photo);
        $imagename = Str::random(10).'.'. $extension;
        $photo->move($folder, $imagename);

        return $imagename;
    }

    public static function unlink_image($folder){
        File::delete($folder);
    }

    public static function base64_upload($img){
        $extension = $img->getClientOriginalExtension();

        return [
            'base64' => base64_encode(file_get_contents($img)),
            'ext' => $extension,
            'filename' => $img->getClientOriginalName()
        ];
    }

    public static function getModel($class, $trigger, $id = false){

        if($trigger == 0){
            $model = new $class;
            $model->flag = 1;
            $model->delete_id = 0;
            return $model;
        }else{
            return $class::find($id);
        }
    }

    public static function softDeleteRecord($class, $id) : void{
        $getModel = CommonController::getModel($class, 1, $id);
        $getModel->delete_id = 1;
        $getModel->save();
    }

    public static function activateRecord($class, $id) : void{
        $getModel = CommonController::getModel($class, 1, $id);
        $getModel->flag = $getModel->flag == 1 ? 0 : 1;
        $getModel->save();
    }

    public function getBangunan(Request $request){
        $model = Bangunan::where('lokasis_id', $request->input('lokasi_id'))->where('flag', 1)->where('delete_id', 0)->get();
        $data = [];
        if($model){
            foreach($model as $m){
                $data[] = [
                    'label' => $m->nama,
                    'value' => $m->id,
                ];
            }
        }

        return response()->json([
            'success' => 1,
            'data' => $data
        ]);
    }

    public function pengguna_carian(Request $request){

        $data = [];
        $search_term = $request->input('q');
        $peribadi = ListPegawai2::where('nokp', 'ilike', '%'.$search_term.'%')
            ->orWhereRaw("LOWER(nama) ilike '%".$search_term."%'")->limit(10)->get();

        if(count($peribadi) != 0){
            foreach($peribadi as $p){
                $data[] = array(
                    'id' => $p->nokp,
                    'text' => html_entity_decode($p->nama, ENT_QUOTES | ENT_HTML5).' - '.$p->jawatan
                );
            }
        }

        return response()->json([
            'data' => $data
        ]);
    }

    public function pengguna_telefon(Request $request){
        $model = ListPegawai2::getMaklumatPegawai($request->input('nokp'));

        return response()->json([
            'data' => str_replace('-', '', $model['tel_bimbit'])
        ]);

    }

    public function file_info_url($url) {
        $file_info = array();
        $urlParts = pathinfo($url);
        $modifyUrl = preg_replace('/\s+/', '%20', $url);
        $image = file_get_contents($modifyUrl);

        if ($image !== false){
            $file_info['filename'] = $urlParts['basename'];
            $file_info['extension'] = $urlParts['extension'];
            $file_info['content'] =  base64_encode($image);
        }

        return $file_info;
    }

    public function translateMonth($date) {
        if(str_contains($date,'Jan')) {
            $date = str_replace('Jan','JANUARI',$date);
        } else if(str_contains($date,'Feb')) {
            $date = str_replace('Feb','FEBRUARI',$date);
        } else if(str_contains($date,'Mar')) {
            $date = str_replace('Mar','MAC',$date);
        } else if(str_contains($date,'Apr')) {
            $date = str_replace('Apr','APRIL',$date);
        } else if(str_contains($date,'May')) {
            $date = str_replace('May','MEI',$date);
        } else if(str_contains($date,'Jun')) {
            $date = str_replace('Jun','JUN',$date);
        } else if(str_contains($date,'Jul')) {
            $date = str_replace('Jul','JULAI',$date);
        } else if(str_contains($date,'Aug')) {
            $date = str_replace('Aug','OGOS',$date);
        } else if(str_contains($date,'Sep')) {
            $date = str_replace('Sep','SEPTEMBER',$date);
        } else if(str_contains($date,'Oct')) {
            $date = str_replace('Oct','OKTOBER',$date);
        } else if(str_contains($date,'Nov')) {
            $date = str_replace('Nov','NOVEMBER',$date);
        } else if(str_contains($date,'Dec')) {
            $date = str_replace('Dec','DISEMBER',$date);
        }

        return $date;
    }

    public function calc_DateOnWorkingDays($count,$date = '') {
        $current = '';
        $holiday_dates = UrussetiaHolidays::where("flag",1)->where("delete_id",0)->get()->pluck('holiday_date')->all();

        if(empty($date)) {
            $current = \Carbon\Carbon::now();
        } else {
            $current = \Carbon\Carbon::parse($date);
        }

        $ignore = false;

        for ($i = 1; $i <= $count; $i++) {
            if($current->isWeekend()) {
                $ignore = true;
            } else {
                foreach($holiday_dates as $hd) {
                    $dateStr = \Carbon\Carbon::parse($hd)->toDateString();
                    if($current->toDateString() == $dateStr) {
                        $ignore = true;
                        break;
                    }
                }
            }

            if($ignore) {
                $i -= 1;
            }

            $current->addDay();
        }

        return $current;
    }
}
