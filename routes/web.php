<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\ReportCreate;
use App\Livewire\ReportList;
use App\Livewire\ReportDetail;
use App\Livewire\AdminReportList;

// ✅ Halaman awal (welcome)
Route::get('/', function () {
    return view('welcome');
});

// ✅ User biasa (harus login)
Route::middleware(['auth'])->group(function () {
    Route::get('/lapor', ReportCreate::class)->name('lapor.create');
    Route::get('/laporan', ReportList::class)->name('laporan.list');
    Route::get('/laporan/{id}', ReportDetail::class)->name('laporan.detail');
});

// ✅ Admin (harus login & role admin)
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/laporan', AdminReportList::class)->name('admin.laporan.index');
});

// ✅ Route Breeze (login/register/logout)
require __DIR__.'/auth.php';
