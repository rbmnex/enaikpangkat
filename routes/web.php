<?php

use App\Http\Controllers\Admin\HolidayMgmtController;
use App\Http\Controllers\Admin\UserMgmtController;
use App\Http\Controllers\Form\UkpController;
use App\Http\Controllers\Form\ViewController;
use App\Http\Controllers\HR\PinkFormController;
use App\Http\Controllers\Main\CommonController;
use App\Http\Controllers\Office\PengesahanController;
use App\Http\Controllers\Test\FunctionController;
use App\Http\Controllers\Test\QueryController;
use App\Http\Controllers\Urussetia\ApplicationController;
use App\Http\Controllers\Urussetia\BatchMgmtController;
use App\Http\Controllers\Urussetia\BatchResumeController;
use App\Http\Controllers\Urussetia\CandidateController;
use App\Http\Controllers\Urussetia\PromotedController;
use App\Http\Controllers\Urussetia\QualifyController;
use App\Http\Controllers\Urussetia\ResumeController;
use App\Http\Controllers\User\PermohonanController;
use App\Models\Lpnk\LpnkParent;
use App\Models\Resume\BatchResume;
use App\Pdf\Ukp12Pdf;
use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts.landing');
});

//test aku untuk vnat, nanti aku delete
Route::get('/test-map', function () {
    return view('map');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/login-vendor', function () {
    return view('auth.login-alt');
});

require __DIR__.'/auth.php';


/* example
    Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function() {
    Route::get('/', 'AdminController@welcome');
    Route::get('/manage', ['middleware' => ['permission:manage-admins'], 'uses' => 'AdminController@manageAdmins']);
});
*/

Route::group(['prefix' => 'admin', 'middleware' => ['role:superadmin']], function() {
    Route::prefix('/pengguna')->group(function() {
        Route::get('/', [UserMgmtController::class,'index']);
        Route::get('/senarai', [UserMgmtController::class,'senarai_pengguna']);
        //Route::get('/carian', [UserMgmtController::class,'carian_pengguna']);
        //Route::get('/api',[UserMgmtController::class,'maklumat_pengguna']);
        Route::post('/api',[UserMgmtController::class,'save_pengguna']);

        Route::get('/mockup2', [UserMgmtController::class,'mockup2']);
        Route::get('/mockup3', [UserMgmtController::class,'mockup3']);
        Route::get('/mockup1', [UserMgmtController::class,'mockup1']);
    });

    Route::prefix('/holiday')->group(function() {
        Route::get('/', [HolidayMgmtController::class,'index']);
        Route::get('/list', [HolidayMgmtController::class,'list']);
        Route::post('/save', [HolidayMgmtController::class,'save'])->middleware(['auth']);
        Route::post('/load', [HolidayMgmtController::class,'load']);
        Route::post('/toggle-active', [HolidayMgmtController::class,'toggleActive']);
        Route::post('/delete-flag', [HolidayMgmtController::class,'flag_delete']);
    });
});
Route::get('/admin/pengguna/carian',[UserMgmtController::class,'carian_pengguna']);
Route::get('/admin/pengguna/api',[UserMgmtController::class,'maklumat_pengguna']);
// Route::prefix('/admin')->group(function() {
//     Route::prefix('/pengguna')->group(function() {
//         Route::get('/', [UserMgmtController::class,'index']);
//         Route::get('/senarai', [UserMgmtController::class,'senarai_pengguna']);
//         Route::get('/carian', [UserMgmtController::class,'carian_pengguna']);
//         Route::get('/api',[UserMgmtController::class,'maklumat_pengguna']);
//         Route::post('/api',[UserMgmtController::class,'save_pengguna']);

//         Route::get('/mockup2', [UserMgmtController::class,'mockup2']);
//         Route::get('/mockup3', [UserMgmtController::class,'mockup3']);
//         Route::get('/mockup1', [UserMgmtController::class,'mockup1']);
//     });
// });

   Route::resource('betafeedback', 'MailController');
        Route::post('mail/sendfeedback', ['as' => 'mail.sendfeedback', 'uses' => 'MailController@sendfeedback']);

Route::prefix('/urussetia')->group(function() {
    Route::prefix('/kumpulan')->group(function() {
        Route::get('/', [BatchMgmtController::class,'index']);
        Route::get('/senarai',[BatchMgmtController::class,'senarai']);
        Route::get('/staff',[BatchMgmtController::class,'senarai_pegawai']);
        Route::get('/carian',[BatchMgmtController::class,'carian_pegawai']);
        Route::post('/simpan',[BatchMgmtController::class,'save_batch'])->middleware(['auth']);
        Route::get('/calon',[BatchMgmtController::class,'senarai_calon']);
        Route::get('/papar',[BatchMgmtController::class,'load_kumpulan']);
        Route::post('/hapus',[BatchMgmtController::class,'hapus_calon'])->middleware(['auth']);
        Route::get('/find', [BatchMgmtController::class,'carian_calon']);
        Route::get('/info',[BatchMgmtController::class,'info_calon']);
        Route::post('/tambah',[BatchMgmtController::class,'tambah_calon'])->middleware(['auth']);
        Route::post('/padam',[BatchMgmtController::class,'delete_batch'])->middleware(['auth']);
        Route::post('/mel',[BatchMgmtController::class,'email_batch'])->middleware(['auth']);
        Route::get('/calon_status',[BatchMgmtController::class,'senarai_calon_status']);
        Route::post('/resend',[BatchMgmtController::class,'resend_email']);
    });

    Route::prefix('/resume')->group(function() {
        Route::get('/', function() {
            $user = Auth::user();
            $jusa = $user->hasRole('adminjusa') ? 1 : 0;
            return view('mockup4',['jusa' => $jusa]);
        });
        Route::get('/terpilih', [ResumeController::class,'terpilih']);
        Route::post('/mockup4', [ResumeController::class,'mockup4']);
        Route::get('/lampiran',[ResumeController::class,'lampiran']);
        Route::get('/display/{id}',[ResumeController::class,'open']);
        Route::get('/senarai',[ResumeController::class,'senarai']);
        Route::get('/senarairesume',[ResumeController::class,'senarai_pengguna']);
        Route::get('/senaraiterpilih',[ResumeController::class,'senarai_terpilih']);
        Route::get('/staff',[ResumeController::class,'senarai_pegawai']);
        Route::get('/carian',[ResumeController::class,'carian_pegawai']);
        Route::post('/list', [ResumeController::class,'list']);
        //Route::get('/display/{id}',[UkpController::class,'open']);
    //    Route::get('/resume', [ResumeController::class, 'document']);
        Route::get('/resume/{ic}', [ResumeController::class, 'document']);

        Route::get('/lampiran3/{ic}', [ResumeController::class, 'lampiran3']);
        Route::get('/email/{ic}', [ResumeController::class, 'email']);
        Route::get('/lampiranlengkap/{ic}', [ResumeController::class, 'lampiranlengkap']);
        Route::get('/paparanall/{ic}', [ResumeController::class, 'paparanAll']);

        Route::prefix('batch')->group(function() {
            Route::get('/view',[BatchResumeController::class,'viewBatch']);
            Route::get('/list',[BatchResumeController::class,'loadBatch']);
            Route::get('/pegawai',[BatchResumeController::class,'searchPegawai']);
            Route::post('/add',[BatchResumeController::class, 'addBatch']);
            Route::post('/delete',[BatchResumeController::class, 'deleteBatch']);
            Route::post('/sendAll',[BatchResumeController::class, 'sendAll']);
        });

        Route::prefix('member')->group(function() {
            Route::get('/view/{id}',[BatchResumeController::class,'viewMember']);
            Route::get('/list/{id}',[BatchResumeController::class,'loadMember']);
            Route::get('/search',[BatchResumeController::class,'searchSingle']);
            Route::get('/info/{nokp}',[BatchResumeController::class,'infoPegawai']);
            Route::post('/addSingle',[BatchResumeController::class,'addSingle']);
            Route::post('/delete',[BatchResumeController::class,'deleteMember']);
            Route::post('/sendSingle',[BatchResumeController::class,'sendSingle']);
        });
    });

    Route::prefix('/appl')->group(function() {
        Route::prefix('/main')->group(function() {
            Route::get('/',[ApplicationController::class,'main_page'])->middleware(['auth']);
            Route::get('/list',[ApplicationController::class,'main_list']);
            Route::post('/delete',[ApplicationController::class,'delete_application']);
            Route::get('/calon/main/{id}',[ApplicationController::class,'applicant_page']);
            Route::get('/calon/list',[ApplicationController::class,'applicant_list']);
        });
        Route::prefix('/calon')->group(function() {
            Route::get('/main/{id}',[ApplicationController::class,'applicant_page']);
            Route::get('/load/list',[ApplicationController::class,'applicant_list']);
            Route::get('/info',[ApplicationController::class,'applicant_info']);
            Route::post('/verdict',[ApplicationController::class,'applicant_verdict']);
            Route::get('/success/view',[QualifyController::class,'load_page']);
            Route::get('/list/success',[QualifyController::class,'load_list']);
            Route::post('/process',[QualifyController::class,'proceed']);
            Route::post('/reset',[ApplicationController::class,'reset_form']);
        });
    });

    Route::prefix('/promote')->group(function() {
        Route::get('/',[CandidateController::class,'index']);
        Route::get('/load',[CandidateController::class,'load']);
        Route::post('/send',[CandidateController::class,'send_promotion']);
        Route::get('/manage',[PromotedController::class,'index']);
        Route::get('/list',[PromotedController::class,'list']);
    });
});

Route::prefix('/hr')->group(function() {
    Route::prefix('/pinkform')->group(function() {
        Route::get('/',[PinkFormController::class,'index']);
        Route::get('/load',[PinkFormController::class,'load']);
    });
});

Route::prefix('/form')->group(function() {
    Route::prefix('/ukp12')->group(function() {
        Route::get('/display/{id}',[UkpController::class,'open'])->middleware(['auth']);
        Route::get('/apply/{encryted}',[UkpController::class,'apply'])->middleware('auth');
        Route::get('/download/part',[UkpController::class,'download_form_part']);
        Route::get('/download/full',[UkpController::class,'download_form_full']);
        Route::get('/final',function() {
            return view('form.message',['message' => 'Anda Telah Berjaya Menghantar Pemohonan Ini!']);
        });
        Route::get('/view/{id}',[ViewController::class,'load_view'])->middleware(['auth']);
        Route::get('/eview/{encryted}',[ViewController::class,'secure_view'])->middleware(['auth']);
        Route::get('/nview/{id}',[ViewController::class,'view_form'])->middleware(['auth']);
        Route::get('/download/view',[ViewController::class,'download_form_full']);
    });

    Route::prefix('/ukp13')->group(function() {
        Route::get('/send/promotion/{id}',[ApplicationController::class,'send_promotion']);
        Route::get('/eview/{encryted}',[ViewController::class,'secure_view_ukp13'])->middleware(['auth']);
        Route::get('/nview/{id}',[ViewController::class,'view_form_ukp13'])->middleware(['auth']);
        Route::get('/download/view',[ViewController::class,'download_form_full']);
    });

    Route::prefix('/api')->group(function() {
        Route::post('/org',[UkpController::class,'save_organization']);
        Route::post('/org/del',[UkpController::class,'delete_organization']);
        Route::post('/kursus',[ResumeController::class,'save_kursus']);
        Route::post('/kursus/del',[ResumeController::class,'delete_kursus']);
        Route::post('/bebankerja',[ResumeController::class,'save_beban']);
         Route::post('/projek',[ResumeController::class,'save_projek']);
         Route::post('/lampirharta',[ResumeController::class,'save_harta']);
         Route::post('/projek/del',[ResumeController::class,'delete_projek']);
        Route::post('/pendedahan',[ResumeController::class,'save_pendedahan']);
         Route::post('/pendedahan/del',[ResumeController::class,'delete_pendedahan']);
         Route::post('/pencapaian',[ResumeController::class,'save_pencapaian']);
        Route::post('/pencapaian/del',[ResumeController::class,'delete_pencapaian']);
        Route::post('/lengkap/lampiran',[ResumeController::class,'complete_lampiran']);
        Route::post('/property/save',[UkpController::class,'save_harta']);
        Route::post('/loan/save',[UkpController::class,'save_loan']);
        Route::post('/submit',[UkpController::class,'submit_application']);
        Route::post('/submit-kader',[UkpController::class,'kader_submission']);
        Route::post('/cuti/upload',[UkpController::class,'upload_pengesahan']);
        Route::post('/form/upload',[UkpController::class,'upload_form']);
        Route::post('/urussetia/submit',[ViewController::class,'urussetia_submit'])->middleware(['auth']);
        Route::post('/kerani/submit',[ViewController::class,'kerani_submit'])->middleware(['auth']);
        Route::post('/kerani/revert',[ViewController::class,'kerani_revert'])->middleware(['auth']);
        Route::post('/ketua/submit',[ViewController::class,'ketua_submit'])->middleware(['auth']);
        Route::post('/get-pencapaian',[ResumeController::class,'getPencapaian']);
        Route::post('/get-pendedahan',[ResumeController::class,'getPendedahan']);
        Route::post('/get-projek',[ResumeController::class,'getProjek']);
        Route::post('/get-kursus',[ResumeController::class,'getKursus']);
        Route::post('/preview-download',[UkpController::class,'save_form'])->middleware(['auth']);
    });
});

Route::prefix('/validate')->group(function() {
    Route::prefix('/senarai')->group(function() {
        Route::get('/hod',[PengesahanController::class,'index_hod']);
        Route::get('/pemohon/hod',[PengesahanController::class,'applicant_list_hod']);
        Route::get('/hos',[PengesahanController::class,'index_hos']);
        Route::get('/pemohon/hos',[PengesahanController::class,'applicant_list_hos']);
    });
});

Route::prefix('/user')->group(function() {
    Route::get('/form',[PermohonanController::class,'index'])->middleware(['auth']);
    Route::get('/form/list',[PermohonanController::class,'load_list']);
    Route::get('/form/pink/{id}',[PermohonanController::class,'downlaod_pink']);
    Route::get('/resume/lampiran',[ResumeController::class,'open_lampiran'])->middleware(['auth']);
    Route::get('/resume/download', [ResumeController::class, 'download'])->middleware(['auth']);
     Route::get('/resume/dashboard', [ResumeController::class, 'resume_dashboard'])->middleware(['auth']);
     Route::get('/resume/paparan', [ResumeController::class, 'paparan'])->middleware(['auth']);
});

//Common Controller
Route::prefix('/common')->group(function () {
    Route::post('/get-listing', [CommonController::class, 'listing']);
    Route::get('/id-download', [CommonController::class, 'download_by_id']);
});

// test api
Route::get('/api/test/query', [QueryController::class, 'testCollection']);
Route::get('/api/func/test',[FunctionController::class, 'func']);
Route::get('/api/test/req',[FunctionController::class, 'req']);
Route::get('/api/test/mail',[FunctionController::class, 'mail']);
Route::post('/api/test/upload',[FunctionController::class,'upload']);
Route::get('/api/test/upload_url',[FunctionController::class,'uploadUrl']);
Route::post('/api/test/download',[FunctionController::class,'download']);
Route::get('/api/test/encrypt',[FunctionController::class,'encrypt']);
Route::get('/api/test/decrypt',[FunctionController::class,'decrypt']);
Route::get('/test/form',function() {
    return view('form.ukp12');
});
Route::get('/test/file',function() {
    return view('test.file');
});

Route::get('/test/view_pdf',function() {
     $lpnk = LpnkParent::with('getChild')->where('delete_id', 0)->get()->toArray();
     $pdf = PDF::loadView('pdf.lnpk', ['soalan' => $lpnk], []);
     return $pdf->stream();

    // return view('pdf.lnpk');
});

Route::get('/test/pdf',function() {
    return Ukp12Pdf::print_test();
    //exit;
});



require __DIR__.'/hr.php';
require __DIR__.'/services.php';
require __DIR__.'/test.php';
//Route::get('/test/pdf',[FunctionController::class,'pdf']);
