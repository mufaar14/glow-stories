<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    public function form($id)
    {
        $produk = Produk::findOrFail($id);
        return view('frontend.pesan', compact('produk'));
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'produk_id' => 'required',
            'qty' => 'required|integer|min:1',
        ]);

        Transaksi::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'produk_id' => $request->produk_id,
            'qty' => $request->qty,
            'total' => $request->qty * Produk::find($request->produk_id)->harga,
        ]);

        return redirect('/')->with('success', 'Pesanan berhasil dibuat!');
    }
}
