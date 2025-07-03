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
Route::resource('kegiatan', KegiatanController::class)->except(['show']);
Route::get('/kegiatan/{kegiatan}', [KegiatanController::class, 'show'])->name('kegiatan.show');
Route::post('/kegiatans/{kegiatan}/toggle-like', [KegiatanController::class, 'toggleLike'])->name('kegiatan.toggleLike');
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/komunitas', [KomunitasController::class, 'index'])->name('komunitas.index');
Route::get('/komunitas/{id}', [KomunitasController::class, 'show'])->name('komunitas.show');
Route::get('/panduan', [PageController::class, 'panduan'])->name('page.panduan');
Route::get('/sop', [PageController::class, 'sop'])->name('sop.index');
Route::get('/filter-research', [ResearchController::class, 'filter'])->name('research.filter');
Route::get('/profile-test', function () {
    return view('public.lab-profile');
});
