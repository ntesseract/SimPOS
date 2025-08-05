<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\BarangAPIController;

Route::get('/barang', [BarangAPIController::class, 'index']);
Route::post('/barang', [BarangAPIController::class, 'store']);
Route::get('/barang/{id}', [BarangAPIController::class, 'show']);