<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PasienController;
use Illuminate\Auth\Middleware\Authenticate;
use App\Http\Controllers\PoliklinikController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\LaporanPasienController;
use App\Http\Controllers\LaporanPendaftaranController;

// Route::get('/', function () {
//     return view('layout.app');
// });

// Route::resource('pasien', PasienController::class);
// Route::resource('pasien', PasienController::class)->middleware(Authenticate::class); //untuk satu route
Route::middleware([Authenticate::class])->group(function () {
    Route::resource('pasien', PasienController::class);
    Route::resource('pendaftaran', PendaftaranController::class);
    Route::resource('poliklinik', PoliklinikController::class);
    Route::resource('laporan/pasien', LaporanPasienController::class);
    Route::resource('laporan/pendaftaran', LaporanPendaftaranController::class);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
Auth::routes();
Route::get('logout', function () {
    Auth::logout();
    return redirect('login');
});
