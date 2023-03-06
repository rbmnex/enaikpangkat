<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Models\Mykj\ListPegawai2;
use App\Models\Tetapan\Bangunan;
use App\Models\Urussetia\Holidays as UrussetiaHolidays;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
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
        $model = ListPegawai2::getMaklumatPegawaiRingkas($request->input('nokp'));

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
        $holidayDates = UrussetiaHolidays::where("flag",1)->where("delete_id",0)->get()->pluck('holiday_date')->all();

        if(empty($date)) {
            $current = date("Y-m-d H:i:s");
        } else {
            $current = date($date);
        }

        $count5WD = 0;
        $temp = strtotime($current); //example as today is 2016-03-25
        // print_r($temp.' ');
        while($count5WD<$count){
            $next1WD = strtotime('+1 weekday', $temp);
            $next1WDDate = date('Y-m-d', $next1WD);
            if(!in_array($next1WDDate, $holidayDates)){
                $count5WD++;
            }
            $temp = $next1WD;
        }

        $next5WD = date("Y-m-d", $temp);

        return \Carbon\Carbon::parse($next5WD);
    }

    public function saveImageFromUrl($url,$name) {
        $contents = file_get_contents($url);
        $storage_disk = 'web';
        Storage::disk($storage_disk)->put('foto-'.$name.'.jpg', $contents);
    }

    public static function mime_type($filename) {

        $mime_types = array(
           'txt' => 'text/plain',
           'htm' => 'text/html',
           'html' => 'text/html',
           'css' => 'text/css',
           'json' => array('application/json', 'text/json'),
           'xml' => 'application/xml',
           'swf' => 'application/x-shockwave-flash',
           'flv' => 'video/x-flv',

           'hqx' => 'application/mac-binhex40',
           'cpt' => 'application/mac-compactpro',
           'csv' => array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel'),
           'bin' => 'application/macbinary',
           'dms' => 'application/octet-stream',
           'lha' => 'application/octet-stream',
           'lzh' => 'application/octet-stream',
           'exe' => array('application/octet-stream', 'application/x-msdownload'),
           'class' => 'application/octet-stream',
           'so' => 'application/octet-stream',
           'sea' => 'application/octet-stream',
           'dll' => 'application/octet-stream',
           'oda' => 'application/oda',
           'ps' => 'application/postscript',
           'smi' => 'application/smil',
           'smil' => 'application/smil',
           'mif' => 'application/vnd.mif',
           'wbxml' => 'application/wbxml',
           'wmlc' => 'application/wmlc',
           'dcr' => 'application/x-director',
           'dir' => 'application/x-director',
           'dxr' => 'application/x-director',
           'dvi' => 'application/x-dvi',
           'gtar' => 'application/x-gtar',
           'gz' => 'application/x-gzip',
           'php' => 'application/x-httpd-php',
           'php4' => 'application/x-httpd-php',
           'php3' => 'application/x-httpd-php',
           'phtml' => 'application/x-httpd-php',
           'phps' => 'application/x-httpd-php-source',
           'js' => array('application/javascript', 'application/x-javascript'),
           'sit' => 'application/x-stuffit',
           'tar' => 'application/x-tar',
           'tgz' => array('application/x-tar', 'application/x-gzip-compressed'),
           'xhtml' => 'application/xhtml+xml',
           'xht' => 'application/xhtml+xml',
           'bmp' => array('image/bmp', 'image/x-windows-bmp'),
           'gif' => 'image/gif',
           'jpeg' => array('image/jpeg', 'image/pjpeg'),
           'jpg' => array('image/jpeg', 'image/pjpeg'),
           'jpe' => array('image/jpeg', 'image/pjpeg'),
           'png' => array('image/png', 'image/x-png'),
           'tiff' => 'image/tiff',
           'tif' => 'image/tiff',
           'shtml' => 'text/html',
           'text' => 'text/plain',
           'log' => array('text/plain', 'text/x-log'),
           'rtx' => 'text/richtext',
           'rtf' => 'text/rtf',
           'xsl' => 'text/xml',
           'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
           'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
           'word' => array('application/msword', 'application/octet-stream'),
           'xl' => 'application/excel',
           'eml' => 'message/rfc822',

           // images
           'png' => 'image/png',
           'jpe' => 'image/jpeg',
           'jpeg' => 'image/jpeg',
           'jpg' => 'image/jpeg',
           'gif' => 'image/gif',
           'bmp' => 'image/bmp',
           'ico' => 'image/vnd.microsoft.icon',
           'tiff' => 'image/tiff',
           'tif' => 'image/tiff',
           'svg' => 'image/svg+xml',
           'svgz' => 'image/svg+xml',

           // archives
           'zip' => array('application/x-zip', 'application/zip', 'application/x-zip-compressed'),
           'rar' => 'application/x-rar-compressed',
           'msi' => 'application/x-msdownload',
           'cab' => 'application/vnd.ms-cab-compressed',

           // audio/video
           'mid' => 'audio/midi',
           'midi' => 'audio/midi',
           'mpga' => 'audio/mpeg',
          'mp2' => 'audio/mpeg',
           'mp3' => array('audio/mpeg', 'audio/mpg', 'audio/mpeg3', 'audio/mp3'),
           'aif' => 'audio/x-aiff',
           'aiff' => 'audio/x-aiff',
           'aifc' => 'audio/x-aiff',
           'ram' => 'audio/x-pn-realaudio',
           'rm' => 'audio/x-pn-realaudio',
           'rpm' => 'audio/x-pn-realaudio-plugin',
           'ra' => 'audio/x-realaudio',
           'rv' => 'video/vnd.rn-realvideo',
           'wav' => array('audio/x-wav', 'audio/wave', 'audio/wav'),
           'mpeg' => 'video/mpeg',
           'mpg' => 'video/mpeg',
           'mpe' => 'video/mpeg',
           'qt' => 'video/quicktime',
           'mov' => 'video/quicktime',
           'avi' => 'video/x-msvideo',
           'movie' => 'video/x-sgi-movie',

           // adobe
           'pdf' => 'application/pdf',
           'psd' => array('image/vnd.adobe.photoshop', 'application/x-photoshop'),
           'ai' => 'application/postscript',
           'eps' => 'application/postscript',
           'ps' => 'application/postscript',

           // ms office
           'doc' => 'application/msword',
           'rtf' => 'application/rtf',
           'xls' => array('application/excel', 'application/vnd.ms-excel', 'application/msexcel'),
           'ppt' => array('application/powerpoint', 'application/vnd.ms-powerpoint'),

           // open office
           'odt' => 'application/vnd.oasis.opendocument.text',
           'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
        );

        $ext = explode('.', $filename);
        $ext = strtolower(end($ext));

        if (array_key_exists($ext, $mime_types)) {
          return (is_array($mime_types[$ext])) ? $mime_types[$ext][0] : $mime_types[$ext];
        } else if (function_exists('finfo_open')) {
           if(file_exists($filename)) {
             $finfo = finfo_open(FILEINFO_MIME);
             $mimetype = finfo_file($finfo, $filename);
             finfo_close($finfo);
             return $mimetype;
           }
        }

        return 'application/octet-stream';
      }
}
