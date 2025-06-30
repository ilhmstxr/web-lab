<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KompetisiController;
use App\Http\Controllers\LabBookingController;
use App\Http\Controllers\LabController;
use App\Http\Controllers\PerwalianController;
use App\Http\Controllers\ResearchController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('Page', PageController::class);
Route::resource('Absensi', AbsensiController::class);
Route::resource('Kompetisi', KompetisiController::class);
Route::resource('LabBooking', LabBookingController::class);
Route::resource('Lab', LabController::class);
Route::resource('Perwalian', PerwalianController::class);
Route::resource('Research', ResearchController::class);


Route::get('/login', function () {
    return view('login');
});

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard')->middleware('auth');

Route::prefix('dashboard')->middleware('auth')->group(function () {
   
});