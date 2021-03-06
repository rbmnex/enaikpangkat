<?php

use App\Http\Controllers\admin\UserMgmtController;
use App\Http\Controllers\Main\CommonController;
use App\Http\Controllers\Test\FunctionController;
use App\Http\Controllers\Test\QueryController;
use App\Http\Controllers\Urussetia\BatchMgmtController;
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

        Route::get('/mockup2', [UserMgmtController::class,'mockup2']);
        Route::get('/mockup3', [UserMgmtController::class,'mockup3']);
        Route::get('/mockup1', [UserMgmtController::class,'mockup1']);
    });
});

Route::prefix('/urussetia')->group(function() {
    Route::prefix('/kumpulan')->group(function() {
        Route::get('/', [BatchMgmtController::class,'index']);
        Route::get('/senarai',[BatchMgmtController::class,'senarai']);
        Route::get('/staff',[BatchMgmtController::class,'senarai_pegawai']);
        Route::get('/carian',[BatchMgmtController::class,'carian_pegawai']);
        Route::post('/simpan',[BatchMgmtController::class,'save_batch']);
        Route::post('/calon',[BatchMgmtController::class,'senarai_calon']);
        Route::post('/papar',[BatchMgmtController::class,'load_kumpulan']);
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
