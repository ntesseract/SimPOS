<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangAPIController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        return response()->json($barangs);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|unique:barangs',
            'nama_barang' => 'required',
            'harga' => 'required|numeric',
        ]);

        $barang = Barang::create($request->all());

        return response()->json($barang, 201);
    }

    public function show($id)
    {
        $barang = Barang::findOrFail($id);
        return response()->json($barang);
    }
}