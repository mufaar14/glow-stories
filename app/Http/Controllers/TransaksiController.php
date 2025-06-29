<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    public function store(Request $request)
    {
        // Validasi opsional (biar lebih rapi)
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'produk_id' => 'required|exists:produks,id',
            'qty' => 'required|integer|min:1',
            'total' => 'required|integer|min:0',
        ]);

        // Simpan ke database
        Transaksi::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'produk_id' => $request->produk_id,
            'qty' => $request->qty,
            'total' => $request->total,
        ]);

        // Redirect dengan notifikasi sukses
        return redirect('/')->with('success', 'Pesanan kamu berhasil dibuat!');
    }
}
