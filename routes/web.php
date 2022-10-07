<?php

use App\Http\Controllers\admin\UserMgmtController;
use App\Http\Controllers\Form\UkpController;
use App\Http\Controllers\HR\PinkFormController;
use App\Http\Controllers\Main\CommonController;
use App\Http\Controllers\Test\FunctionController;
use App\Http\Controllers\Test\QueryController;
use App\Http\Controllers\Urussetia\BatchMgmtController;
use App\Http\Controllers\Urussetia\ResumeController;
use App\Pdf\Ukp12Pdf;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/login-vendor', function () {
    return view('auth.login-alt');
});

require __DIR__.'/auth.php';

Route::prefix('/admin')->group(function() {
    Route::prefix('/pengguna')->group(function() {
        Route::get('/', [UserMgmtController::class,'index']);
        Route::get('/senarai', [UserMgmtController::class,'senarai_pengguna']);
        Route::get('/carian', [UserMgmtController::class,'carian_pengguna']);
        Route::get('/api',[UserMgmtController::class,'maklumat_pengguna']);
        Route::post('/api',[UserMgmtController::class,'save_pengguna']);

        Route::get('/mockup2', [UserMgmtController::class,'mockup2']);
        Route::get('/mockup3', [UserMgmtController::class,'mockup3']);
        Route::get('/mockup1', [UserMgmtController::class,'mockup1']);
        Route::get('/mockup4', [UserMgmtController::class,'mockup4']);
        Route::post('/mockup4', [UserMgmtController::class,'mockup4']);
        Route::get('/resume/{ic}', [UserMgmtController::class, 'document']);
    });
});

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


    });

    Route::prefix('/resume')->group(function() {
        Route::get('/', function() { return view('mockup4'); });
        Route::post('/mockup4', [ResumeController::class,'mockup4']);
        Route::get('/resume', [ResumeController::class, 'document']);
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
        Route::get('/display/{id}',[UkpController::class,'open']);

    });
});

//Common Controller
Route::prefix('/common')->group(function () {
    Route::post('/get-listing', [CommonController::class, 'listing']);
});

// test api
Route::get('/api/test/query', [QueryController::class, 'testQuery']);
Route::get('/api/func/test',[FunctionController::class, 'func']);
Route::get('/api/test/req',[FunctionController::class, 'req']);
Route::get('/api/test/mail',[FunctionController::class, 'mail']);
Route::post('/api/test/upload',[FunctionController::class,'upload']);
Route::post('/api/test/download',[FunctionController::class,'download']);
Route::get('/test/form',function() {
    return view('form.ukp12');
});
Route::get('/test/file',function() {
    return view('test.file');
});

Route::get('/test/view_pdf',function() {
    return view('pdf.ukp12');
});

Route::get('/test/pdf',function() {
    Ukp12Pdf::print();
    exit;
});

//Route::get('/test/pdf',[FunctionController::class,'pdf']);
