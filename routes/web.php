<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::get('/daftarpengaduan', [App\Http\Controllers\PengaduanController::class, 'index'])->name('daftarpengaduan');
Route::get('/daftarlaporan', [App\Http\Controllers\LaporanController::class, 'index'])->name('daftarlaporan');

Route::middleware('auth')->group(function () {
    // Route untuk pengguna biasa
    Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('pengaduan.index');
    Route::get('/pengaduan/create', [PengaduanController::class, 'create'])->name('pengaduan.create');
    Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');
    Route::get('/pengaduan/{pengaduan}', [PengaduanController::class, 'show'])->name('pengaduan.show');
    Route::get('/pengaduan/{pengaduan}/edit', [PengaduanController::class, 'edit'])->name('pengaduan.edit');
    Route::put('/pengaduan/{pengaduan}', [PengaduanController::class, 'update'])->name('pengaduan.update');
    Route::delete('/pengaduan/{pengaduan}', [PengaduanController::class, 'destroy'])->name('pengaduan.destroy');

    // Route khusus admin (hanya bisa show dan delete)
    Route::middleware('can:isAdmin')->group(function () {
        Route::get('/admin/pengaduan/{pengaduan}', [PengaduanController::class, 'show'])->name('admin.pengaduan.show');
        Route::delete('/admin/pengaduan/{pengaduan}', [PengaduanController::class, 'destroy'])->name('admin.pengaduan.destroy');
    });
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
