<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Auth::routes();

// Redirect ke halaman admin
Route::get('/', function () {
    return redirect('admin/');
});

// Home setelah login
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Logout
Route::get('logout', [LoginController::class, 'logout']);

// Admin dashboard
Route::get('admin/', [AdminController::class, 'beranda'])->middleware('auth');

// Kamar
Route::resource('admin/kamar', KamarController::class)->middleware('auth');
Route::get('admin/delete/{id}', [KamarController::class, 'destroy'])->middleware('auth');

// Pesanan (diberi nama supaya konsisten dengan Blade route('pesanan.*'))
Route::resource('admin/pesanan', PesananController::class)
    ->middleware('auth')
    ->names([
        'index'   => 'pesanan.index',
        'create'  => 'pesanan.create',
        'store'   => 'pesanan.store',
        'show'    => 'pesanan.show',
        'edit'    => 'pesanan.edit',
        'update'  => 'pesanan.update',
        'destroy' => 'pesanan.destroy',
    ]);
Route::get('admin/pesanan/delete/{id}', [PesananController::class, 'destroy'])->middleware('auth');

// Pembayaran
Route::resource('admin/pembayaran', PembayaranController::class)->middleware('auth');

// Fasilitas
Route::get('admin/fasilitas/delete/{id}', [FasilitasController::class, 'destroy'])->middleware('auth');

// Laporan
Route::get('admin/laporan', [LaporanController::class, 'index'])->middleware('auth');
Route::post('admin/laporan/show', [LaporanController::class, 'show'])->middleware('auth');
