@extends('layouts.app')

@section('title', 'Detail Transaksi #' . $transaksi->id)

@section('content')
<div class="bg-white rounded-lg shadow-md p-6 max-w-4xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-semibold text-bluesky-dark">Detail Transaksi #{{ $transaksi->id }}</h2>
        <span class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm">
            {{ $transaksi->tanggal->format('d/m/Y H:i') }}
        </span>
    </div>

    <div class="mb-6">
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <p class="text-sm text-gray-500">Total Barang</p>
                <p class="font-medium">{{ $transaksi->total_barang }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Total Harga</p>
                <p class="font-medium text-lg">Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</p>
            </div>
        </div>
    </div>

    <h3 class="text-lg font-medium text-gray-700 mb-3">Daftar Barang</h3>
    <div class="border border-gray-200 rounded-lg overflow-hidden">
        <table class="min-w-full">
            <thead class="bg-bluesky-light">
                <tr>
                    <th class="py-3 px-4 text-left">Nama Barang</th>
                    <th class="py-3 px-4 text-left">Harga</th>
                    <th class="py-3 px-4 text-left">Jumlah</th>
                    <th class="py-3 px-4 text-left">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transaksi->detailTransaksis as $item)
                <tr class="border-b border-gray-200 hover:bg-gray-50">
                    <td class="py-3 px-4">{{ $item->barang->nama_barang }}</td>
                    <td class="py-3 px-4">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                    <td class="py-3 px-4">{{ $item->jumlah }}</td>
                    <td class="py-3 px-4">Rp {{ number_format($item->harga * $item->jumlah, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        <a href="{{ route('transaksi.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded">
            Kembali ke Daftar Transaksi
        </a>
    </div>
</div>
@endsection