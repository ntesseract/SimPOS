<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use Illuminate\Http\Request;

class KasirController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        return view('kasir.index', compact('barangs'));
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*.id' => 'required|exists:barangs,id',
            'items.*.quantity' => 'required|numeric|min:1',
        ]);

        // Hitung total
        $total_barang = 0;
        $total_harga = 0;
        $items = [];

        foreach ($request->items as $item) {
            $barang = Barang::find($item['id']);
            $subtotal = $barang->harga * $item['quantity'];
            
            $items[] = [
                'barang' => $barang,
                'quantity' => $item['quantity'],
                'subtotal' => $subtotal
            ];

            $total_barang += $item['quantity'];
            $total_harga += $subtotal;
        }

        // Buat transaksi
        $transaksi = Transaksi::create([
            'tanggal' => now(),
            'total_barang' => $total_barang,
            'total_harga' => $total_harga,
        ]);

        // Buat detail transaksi
        foreach ($items as $item) {
            DetailTransaksi::create([
                'transaksi_id' => $transaksi->id,
                'barang_id' => $item['barang']->id,
                'harga' => $item['barang']->harga,
                'jumlah' => $item['quantity'],
            ]);
        }

        return redirect()->route('transaksi.show', $transaksi->id)
            ->with('success', 'Transaksi berhasil disimpan');
    }
}