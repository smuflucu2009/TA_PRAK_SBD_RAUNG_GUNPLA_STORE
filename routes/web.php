<?php

use App\Http\Controllers\GudangController;
use App\Http\Controllers\GunplaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PembeliController;
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

// contoh
// route::get('mahasiswa', [MahasiswaController::class, 'index']);
// route::get('mahasiswa/{id}', [MahasiswaController::class, 'detail'])->where('id', '[0-9]+');

route::get('/', [HomeController::class, 'index']);


Route::resource('/gunpla', GunplaController::class);
Route::get('/gunpla', [GunplaController::class, 'index']);
Route::get('/gunpla-add', [GunplaController::class, 'create']);
Route::get('/gunpla-update', [GunplaController::class, 'update']);


Route::resource('/pembeli', PembeliController::class);
Route::get('/pembeli', [PembeliController::class, 'index']);
Route::get('/pembeli-add', [PembeliController::class, 'create']);
Route::get('/pembeli-update', [PembeliController::class, 'update']);


Route::resource('/gudang', GudangController::class);
Route::get('/gudang', [GudangController::class, 'index']);
