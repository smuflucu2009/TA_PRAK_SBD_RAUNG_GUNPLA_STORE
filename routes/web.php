<?php

use App\Http\Controllers\GudangController;
use App\Http\Controllers\GunplaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JoinController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Auth;
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

Route::middleware(['auth'])->group(function () {
    route::get('/', [WelcomeController::class, 'index'])->name('welcome.index');
    route::get('/join', [JoinController::class, 'index'])->name('join.index');
    
    
    Route::resource('/gunpla', GunplaController::class);
    Route::get('/gunpla', [GunplaController::class, 'index'])->name('gunpla.index');
    Route::get('/gunpla-add', [GunplaController::class, 'create'])->name('gunpla.create');
    Route::get('/cariGunpla', [GunplaController::class, 'cariGunpla'])->name('gunpla.cari');
    Route::get('/sortingGunpla', [GunplaController::class, 'sortingGunpla'])->name('gunpla.sorting');
    Route::post('/gunpla/softdelete/{id}', [GunplaController::class, 'softDelete'])->name('gunpla.softdelete');
    Route::get('/gunpla-restore-{id}', [GunplaController::class, 'restore'])->name('gunpla.restore');
    Route::get('/gunpla-sampah', [GunplaController::class, 'Gunplasampah'])->name('gunpla.sampah');
    
    
    Route::resource('/pembeli', PembeliController::class);
    Route::get('/pembeli', [PembeliController::class, 'index'])->name('pembeli.index');
    Route::get('/pembeli-add', [PembeliController::class, 'create'])->name('pembeli.create');
    Route::get('/cariPembeli', [PembeliController::class, 'cariPembeli'])->name('pembeli.cari');
    Route::post('/pembeli/softdelete/{id}', [PembeliController::class, 'softDelete'])->name('pembeli.softdelete');
    Route::get('/pembeli-restore-{id}', [PembeliController::class, 'restore'])->name('pembeli.restore');
    Route::get('/pembeli-sampah', [PembeliController::class, 'Pembelisampah'])->name('pembeli.sampah');
    
    
    Route::resource('/gudang', GudangController::class);
    Route::get('/gudang', [GudangController::class, 'index'])->name('gudang.index');
    Route::get('/gudang-add', [GudangController::class, 'create'])->name('gudang.create');
    
    Route::resource('/join', JoinController::class);
    Route::get('/join', [JoinController::class, 'join'])->name('join.index'); 
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
