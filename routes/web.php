<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\KompetisiController;
use App\Http\Controllers\LabBookingController;
use App\Http\Controllers\LabController;
use App\Http\Controllers\PerwalianController;
use App\Http\Controllers\ResearchController;
use App\Http\Controllers\User\KegiatanController as PublicKegiatan;
use App\Http\Controllers\Admin\KegiatanController as AdminKegiatan;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::resource('Page', PageController::class);
Route::resource('Absensi', AbsensiController::class);
Route::resource('Kompetisi', KompetisiController::class);
Route::resource('LabBooking', LabBookingController::class);
Route::resource('Lab', LabController::class);
Route::resource('Perwalian', PerwalianController::class);
Route::resource('Research', ResearchController::class);

Route::get('/panduan', [PageController::class, 'panduan'])->name('page.panduan');
Route::get('/kegiatan', [PublicKegiatan::class, 'index'])->name('kegiatan.user.index');
Route::get('/kegiatan/{kegiatan}', [PublicKegiatan::class, 'show'])->name('kegiatan.user.show');

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/', fn() => view('admin.dashboard'))->name('admin.dashboard'); // buat file: resources/views/admin/dashboard.blade.php

    Route::resource('kegiatan', AdminKegiatan::class);
});

require __DIR__ . '/auth.php';
