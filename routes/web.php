<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\AuthController;

Route::get('/',               [HospitalController::class, 'home'])->name('home');
Route::get('/tentang-kami',   [HospitalController::class, 'tentang'])->name('tentang');
Route::get('/pelayanan',      [HospitalController::class, 'layanan'])->name('layanan');
Route::get('/dokter',         [HospitalController::class, 'dokter'])->name('dokter');
Route::get('/dokter/online',  [HospitalController::class, 'dokterOnline'])->name('dokter.online');
Route::get('/fasilitas',      [HospitalController::class, 'fasilitas'])->name('fasilitas');
Route::get('/kontak',         [HospitalController::class, 'kontak'])->name('kontak');
Route::post('/kontak',        [HospitalController::class, 'kontak_store'])->name('kontak.store');
Route::get('/promo',          [HospitalController::class, 'promo'])->name('promo');
Route::get('/event',          [HospitalController::class, 'event'])->name('event');
Route::get('/artikel',        [HospitalController::class, 'artikel'])->name('artikel');
Route::get('/cabang',         [HospitalController::class, 'cabang'])->name('cabang');
Route::get('/medical-checkup',[HospitalController::class, 'mcu'])->name('mcu');
Route::get('/live-antrian',   [HospitalController::class, 'liveAntrian'])->name('live.antrian');

// Auth routes
Route::get('/sign-in',        [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/sign-in',       [AuthController::class, 'login'])->name('login.post');
Route::post('/sign-out',      [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/dashboard',      [AuthController::class, 'dashboard'])->name('dashboard')->middleware('auth');
