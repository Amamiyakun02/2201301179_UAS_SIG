<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\IconController;
use App\Http\Controllers\JenisPerkebunanController;
use App\Http\Controllers\KebunController;
use App\Http\Controllers\API\DataController;


Route::get('/', function () {
    return view('layouts.index');
});

//Routes Kebun
Route::prefix('kebun')->group(function () {
    Route::get('/', [KebunController::class, 'index'])->name('kebun');
    Route::get('/tambah', [KebunController::class, 'tambah'])->name('kebun.tambah');
    Route::post('/store', [KebunController::class, 'store'])->name('kebun.store');
    Route::get('/edit/{id}', [KebunController::class, 'edit']);
    Route::put('/update', [KebunController::class, 'update']);
    Route::delete('/delete/{id}', [KebunController::class, 'destroy']);
});

//Routes Marker
Route::prefix('icon')->group(function () {
    Route::get('/', [IconController::class, 'index'])->name('icon');
    Route::get('/tambah', [IconController::class, 'tambah'])->name('icon.tambah');
    Route::post('/store', [IconController::class, 'store'])->name('icon.store');
    Route::get('/edit/{id}', [IconController::class, 'edit']);
    Route::put('//update', [IconController::class, 'update']);
    Route::delete('/delete/{id}', [IconController::class, 'destroy']);
});

//Route jenis Perkebunan
Route::prefix('jenis_perkebunan')->group(function () {
    Route::get('/', [JenisPerkebunanController::class, 'index'])->name('jenis_perkebunan');
    Route::get('/tambah', [JenisPerkebunanController::class, 'tambah'])->name('jenis_perkebunan.tambah');
    Route::post('/store', [JenisPerkebunanController::class, 'store'])->name('jenis_perkebunan.store');
    Route::get('/edit/{id}', [JenisPerkebunanController::class, 'edit']);
    Route::put('/update', [JenisPerkebunanController::class, 'update']);
    Route::delete('/delete/{id}', [JenisPerkebunanController::class, 'destroy']);
});

//Routes API
Route::prefix('api')->group(function () {
    Route::get('/data', [DataController::class, 'index']);
});

Route::get('/main', [BaseController::class, 'index']);

