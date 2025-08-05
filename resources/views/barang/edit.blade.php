@extends('layouts.app')

@section('title', isset($barang) ? 'Edit Barang' : 'Tambah Barang')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6 max-w-md mx-auto">
    <h2 class="text-xl font-semibold text-bluesky-dark mb-6">{{ isset($barang) ? 'Edit Barang' : 'Tambah Barang' }}</h2>
    
    <form action="{{ isset($barang) ? route('barang.update', $barang->id) : route('barang.store') }}" method="POST">
        @csrf
        @if(isset($barang))
            @method('PUT')
        @endif

        <div class="mb-4">
            <label for="kode_barang" class="block text-sm font-medium text-gray-700">Kode Barang</label>
            <input type="text" name="kode_barang" id="kode_barang" value="{{ old('kode_barang', $barang->kode_barang ?? '') }}"
                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-bluesky focus:border-bluesky">
            @error('kode_barang')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="nama_barang" class="block text-sm font-medium text-gray-700">Nama Barang</label>
            <input type="text" name="nama_barang" id="nama_barang" value="{{ old('nama_barang', $barang->nama_barang ?? '') }}"
                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-bluesky focus:border-bluesky">
            @error('nama_barang')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="harga" class="block text-sm font-medium text-gray-700">Harga</label>
            <input type="number" name="harga" id="harga" value="{{ old('harga', $barang->harga ?? '') }}"
                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-bluesky focus:border-bluesky">
            @error('harga')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end">
            <a href="{{ route('barang.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded mr-2">
                Batal
            </a>
            <button type="submit" class="bg-bluesky hover:bg-bluesky-dark text-white px-4 py-2 rounded">
                {{ isset($barang) ? 'Update' : 'Simpan' }}
            </button>
        </div>
    </form>
</div>
@endsection