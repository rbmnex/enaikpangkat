<?php

use App\Http\Controllers\admin\UserMgmtController;
use App\Http\Controllers\Test\FunctionController;
use App\Http\Controllers\Test\QueryController;
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
    });
});

// test api
Route::get('/api/test/query', [QueryController::class, 'testQuery']);
Route::get('/api/func/test',[FunctionController::class, 'func']);
