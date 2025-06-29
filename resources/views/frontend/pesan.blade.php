@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-10 bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4 text-blue-700">Form Pemesanan</h2>

    <form method="POST" action="{{ route('pesan.simpan') }}">
        @csrf
        <input type="hidden" name="produk_id" value="{{ $produk->id }}">

        <div class="mb-4">
            <label class="block mb-1">Nama Lengkap</label>
            <input type="text" name="nama" class="w-full border rounded p-2" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Alamat</label>
            <textarea name="alamat" class="w-full border rounded p-2" required></textarea>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Jumlah</label>
            <input type="number" name="qty" class="w-full border rounded p-2" value="1" min="1" required>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Pesan Sekarang
        </button>
    </form>
</div>
@endsection
