<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\HomeController;

// Route untuk Beranda
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route untuk Barang
Route::resource('barang', BarangController::class);

// Route untuk Transaksi
Route::resource('transaksi', TransaksiController::class);

// Route untuk Kasir
Route::get('kasir', [KasirController::class, 'index'])->name('kasir.index');
Route::post('kasir/checkout', [KasirController::class, 'checkout'])->name('kasir.checkout');