<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Member\LaporanController;
use App\Http\Controllers\Member\PanduanController;
use App\Http\Controllers\Member\DashboardController;
use App\Http\Controllers\Member\TransaksiController;
use App\Http\Controllers\Member\AkunKeuanganController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified', 'role:member'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/akun', AkunKeuanganController::class);
    Route::resource('/transaksi', TransaksiController::class);
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/excel', [LaporanController::class, 'exportExcel'])->name('member.laporan.excel');
    Route::get('/laporan/pdf', [LaporanController::class, 'exportPdf'])->name('member.laporan.pdf');
    Route::get('/panduan', [PanduanController::class, 'index'])->name('member.panduan.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

require __DIR__ . '/auth.php';
