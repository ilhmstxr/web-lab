<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\KompetisiController;
use App\Http\Controllers\LabBookingController;
use App\Http\Controllers\LabController;
use App\Http\Controllers\PerwalianController;
use App\Http\Controllers\ResearchController;


Route::get('/', function () {
    return view('public.index');
});

Route::resource('Page', PageController::class);
Route::resource('Absensi', AbsensiController::class);
Route::resource('Kompetisi', KompetisiController::class);
Route::resource('LabBooking', LabBookingController::class);
Route::resource('Lab', LabController::class);
Route::resource('Perwalian', PerwalianController::class);
Route::resource('Research', ResearchController::class);
