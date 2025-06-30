<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AuthController;
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
