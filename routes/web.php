<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Member\LaporanController;
use App\Http\Controllers\Member\PanduanController;
use App\Http\Controllers\Member\DashboardController;
use App\Http\Controllers\Member\TransaksiController;
use App\Http\Controllers\Member\AkunKeuanganController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\KategoriMasterController as AdminKategoriMasterController;

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

Route::middleware(['auth', 'role:admin'])->prefix('admin')
    ->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

        Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
        Route::get('/users/{user}/edit', [AdminUserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{user}', [AdminUserController::class, 'update'])->name('users.update');

        Route::patch('/users/{user}/toggle-status', [AdminUserController::class, 'toggleStatus'])
            ->name('users.toggle-status');

        Route::post('/users/{user}/reset-password', [AdminUserController::class, 'resetPassword'])
            ->name('users.reset-password');

        Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])
            ->name('users.destroy');

        Route::resource('kategori-master', AdminKategoriMasterController::class);
    });

require __DIR__ . '/auth.php';
