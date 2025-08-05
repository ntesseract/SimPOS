@extends('layouts.app')

@section('title', 'Daftar Transaksi')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <h2 class="text-xl font-semibold text-bluesky-dark mb-6">Daftar Transaksi</h2>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead>
                <tr class="bg-bluesky-light">
                    <th class="py-3 px-4 text-left">ID</th>
                    <th class="py-3 px-4 text-left">Tanggal</th>
                    <th class="py-3 px-4 text-left">Total Barang</th>
                    <th class="py-3 px-4 text-left">Total Harga</th>
                    <th class="py-3 px-4 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transaksis as $transaksi)
                <tr class="border-b border-gray-200 hover:bg-gray-50">
                    <td class="py-3 px-4">{{ $transaksi->id }}</td>
                    <td class="py-3 px-4">{{ $transaksi->tanggal->format('d/m/Y H:i') }}</td>
                    <td class="py-3 px-4">{{ $transaksi->total_barang }}</td>
                    <td class="py-3 px-4">Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>
                    <td class="py-3 px-4">
                        <a href="{{ route('transaksi.show', $transaksi->id) }}" class="text-bluesky hover:text-bluesky-dark">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection