@extends('layouts.app')

@section('title', 'SimPOS - Sistem Point of Sale')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6 text-center">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold text-bluesky-dark mb-4">Selamat Datang di SimPOS</h1>
        <p class="text-gray-600 mb-8">Sistem Point of Sale sederhana untuk mengelola transaksi penjualan Anda</p>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Kasir Card -->
            <a href="{{ route('kasir.index') }}" class="bg-bluesky-light hover:bg-bluesky transition-all rounded-lg p-6 shadow-sm">
                <div class="text-bluesky-dark mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <h3 class="font-semibold text-lg mb-2">Kasir</h3>
                <p class="text-gray-600 text-sm">Lakukan transaksi penjualan</p>
            </a>
            
            <!-- Barang Card -->
            <a href="{{ route('barang.index') }}" class="bg-bluesky-light hover:bg-bluesky transition-all rounded-lg p-6 shadow-sm">
                <div class="text-bluesky-dark mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                </div>
                <h3 class="font-semibold text-lg mb-2">Daftar Barang</h3>
                <p class="text-gray-600 text-sm">Kelola produk dan stok</p>
            </a>
            
            <!-- Transaksi Card -->
            <a href="{{ route('transaksi.index') }}" class="bg-bluesky-light hover:bg-bluesky transition-all rounded-lg p-6 shadow-sm">
                <div class="text-bluesky-dark mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                </div>
                <h3 class="font-semibold text-lg mb-2">Daftar Transaksi</h3>
                <p class="text-gray-600 text-sm">Riwayat penjualan</p>
            </a>
        </div>
        
        <div class="mt-12 bg-gray-50 p-6 rounded-lg">
            <h2 class="text-xl font-semibold text-bluesky-dark mb-4">Tentang SimPOS</h2>
            <p class="text-gray-600 mb-4">SimPOS adalah sistem Point of Sale sederhana yang dibangun dengan Laravel dan Tailwind CSS.</p>
            <p class="text-gray-600">Fitur utama: Kasir, Manajemen Barang, dan Laporan Transaksi.</p>
        </div>
    </div>
</div>
@endsection