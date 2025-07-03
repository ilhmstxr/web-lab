<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\KompetisiController;
use App\Http\Controllers\LabBookingController;
use App\Http\Controllers\LabController;
use App\Http\Controllers\PerwalianController;
use App\Http\Controllers\ResearchController;
use App\Http\Controllers\FormAbsensiController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\KomunitasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PortofolioController;

Route::get('/', [PageController::class, 'index'])->name('home');

Route::resource('page', PageController::class);
Route::resource('absensi', AbsensiController::class);
Route::resource('kompetisi', KompetisiController::class);
Route::resource('lab-booking', LabBookingController::class);
Route::resource('lab', LabController::class);
Route::resource('perwalian', PerwalianController::class);
Route::resource('research', ResearchController::class);
Route::resource('form-absensi', FormAbsensiController::class);
Route::resource('profile', ProfileController::class);
Route::resource('portofolio', PortofolioController::class);
Route::resource('kegiatan', KegiatanController::class);

Route::get('/kegiatan/{kegiatan}', [KegiatanController::class, 'show'])->name('kegiatan.show');
Route::post('/kegiatans/{kegiatan}/toggle-like', [KegiatanController::class, 'toggleLike'])->name('kegiatan.toggleLike');

Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

Route::get('/komunitas',
