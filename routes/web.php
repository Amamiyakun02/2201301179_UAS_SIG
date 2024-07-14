<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\IconController;
use App\Http\Controllers\JenisPerkebunanController;
use App\Http\Controllers\KebunController;

Route::get('/', [BaseController::class, 'index']);

//Routes Kebun
Route::prefix('kebun')->group(function () {
    Route::get('/', [KebunController::class, 'index'])->name('kebun');
    Route::get('/tambah', [KebunController::class, 'tambah'])->name('kebun.tambah');
    Route::post('/store', [KebunController::class, 'store'])->name('kebun.store');
    Route::delete('/delete/{id}', [KebunController::class, 'destroy']);
});

//Routes Marker
Route::prefix('marker')->group(function () {
    Route::get('/', [IconController::class, 'index'])->name('marker');
    Route::get('/tambah', [IconController::class, 'tambah'])->name('icon.tambah');
    Route::post('/store', [IconController::class, 'store'])->name('icon.store');
    Route::delete('/delete/{id}', [IconController::class, 'destroy']);
});

//Route jenis Perkebunan
Route::prefix('jenis_perkebunan')->group(function () {
    Route::get('/', [JenisPerkebunanController::class, 'index'])->name('jenis_perkebunan');
    Route::get('/tambah', [JenisPerkebunanController::class, 'tambah'])->name('jenis_perkebunan.tambah');
    Route::post('/store', [JenisPerkebunanController::class, 'store'])->name('jenis_perkebunan.store');
    Route::delete('/delete/{id}', [JenisPerkebunanController::class, 'destroy']);
});

//Routes API
Route::prefix('data')->group(function () {
    Route::get('/data_kebun', [BaseController::class, 'getKebun']);
    Route::get('/data_jenis', [BaseController::class, 'getJenisPerkebunan']);
    Route::get('/data_icon', [BaseController::class, 'getIcon']);
});

