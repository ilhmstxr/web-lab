<?php

use App\Http\Controllers\FormAbsensiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\JasaHostingController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\KompetisiController;
use App\Http\Controllers\LabBookingController;
use App\Http\Controllers\LabController;
use App\Http\Controllers\PerwalianController;
use App\Http\Controllers\ResearchController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KomunitasController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\SopController;

// Route::get('/', function () {
//     return view('public.index');
// });

route::get('/', [PageController::class, 'index'])->name('home');
Route::resource('Page', PageController::class);
Route::resource('Absensi', AbsensiController::class);
Route::resource('Kompetisi', KompetisiController::class);
Route::resource('LabBooking', LabBookingController::class);
Route::resource('Lab', LabController::class);
Route::resource('Perwalian', PerwalianController::class);
Route::resource('Research', ResearchController::class);
Route::resource('FormAbsensi', FormAbsensiController::class);
Route::resource('Profile', ProfileController::class);
route::resource('Portofolio', PortofolioController::class);
Route::get('/komunitas', [KomunitasController::class, 'index'])->name('komunitas.index');
Route::get('/komunitas/{id}', [KomunitasController::class, 'show'])->name('komunitas.show');
Route::resource('/Kegiatan', KegiatanController::class);

Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/panduan', [PageController::class, 'panduan'])->name('page.panduan');
// Route::get('/sop', [PageController::lass, 'sop'])->name('sop.index');
Route::resource('/Sop', SopController::class);

route::get('/profile-test', function () {
    return view('public.lab-profile');
});
Route::get('/filter-research', [ResearchController::class, 'filter'])->name('research.filter');

Route::resource('JasaHosting', JasaHostingController::class);


// route::get('/sewa_lab', function () {
//     return view('public.lab-booking');
// })->name('home');

Route::get('/layanan/data-skripsi', function () {
    return view('public.data-skripsi');
})->name('data-skripsi');
