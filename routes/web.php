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
    Route::get('/', [KebunController::class, 'index']);
    Route::get('/tambah', [KebunController::class, 'create']);
    Route::post('/store', [KebunController::class, 'store']);
    Route::get('/edit/{id}', [KebunController::class, 'edit']);
    Route::put('/update', [KebunController::class, 'update']);
    Route::delete('/delete/{id}', [KebunController::class, 'destroy']);
});

//Routes Marker
Route::prefix('marker')->group(function () {
    Route::get('/', [IconController::class, 'index']);
    Route::get('/tambah', [IconController::class, 'tambah']);
    Route::post('/store', [IconController::class, 'store']);
    Route::get('/edit/{id}', [IconController::class, 'edit']);
    Route::put('//update', [IconController::class, 'update']);
    Route::delete('/delete/{id}', [IconController::class, 'destroy']);
});

//Route jenis Perkebunan
Route::prefix('jenis-perkebunan')->group(function () {
    Route::get('/', [JenisPerkebunanController::class, 'index']);
    Route::get('/tambah', [JenisPerkebunanController::class, 'tambah']);
    Route::post('/store', [JenisPerkebunanController::class, 'store']);
    Route::get('/edit/{id}', [JenisPerkebunanController::class, 'edit']);
    Route::put('/update', [JenisPerkebunanController::class, 'update']);
    Route::delete('/delete/{id}', [JenisPerkebunanController::class, 'destroy']);
});

//Routes API
Route::prefix('api')->group(function () {
    Route::get('/data', [DataController::class, 'index']);
});

Route::get('/main', [BaseController::class, 'index']);

