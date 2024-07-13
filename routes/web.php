<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\IconController;
use App\Http\Controllers\JenisPerkebunanController;
use App\Http\Controllers\KebunController;
use App\Http\Controllers\API\DataController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/kebun', [KebunController::class, 'index']);
Route::get('/icon', [IconController::class, 'index']);
Route::get('/jenis_perkebunan', [JenisPerkebunanController::class, 'index']);
Route::get('/jenis_perkebunan/tambah', [JenisPerkebunanController::class, 'tambah'])->name('jenis_perkebunan.tambah');
Route::get('/main', [BaseController::class, 'index']);

