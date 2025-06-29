@extends('layouts.app')

@section('content')
@if (session('success'))
    <div class="bg-green-100 text-green-800 border border-green-400 px-4 py-3 rounded mb-6 w-3/4 mx-auto text-center">
        {{ session('success') }}
    </div>
@endif

<div class="bg-white shadow-sm py-8">
    {{-- Judul Tengah --}}
    <div class="text-center mb-4">
        <h1 class="text-3xl font-bold text-babyblue">Besties For You</h1>
    </div>

    {{-- Tombol Kategori --}}
    <div class="text-center mb-8">
        <a href="{{ url('/') }}" class="inline-block bg-blue-100 text-blue-700 px-4 py-2 rounded-full mx-2 hover:bg-blue-200">All</a>
        <a href="{{ url('/kategori/hair-care') }}" class="inline-block bg-blue-100 text-blue-700 px-4 py-2 rounded-full mx-2 hover:bg-blue-200">Hair Care</a>
        <a href="{{ url('/kategori/body-care') }}" class="inline-block bg-green-100 text-green-700 px-4 py-2 rounded-full mx-2 hover:bg-green-200">Body Care</a>
        <a href="{{ url('/kategori/skin-care') }}" class="inline-block bg-pink-100 text-pink-700 px-4 py-2 rounded-full mx-2 hover:bg-pink-200">Skin Care</a>
    </div>

    {{-- Tampilkan Produk --}}
    <div class="container mx-auto px-4 pb-10">
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6">
            @forelse($produks as $produk)
                <div class="bg-white rounded-lg shadow hover:shadow-md p-4 text-center">
                    <img src="{{ asset('storage/' . $produk->gambar) }}"
                        class="mx-auto mb-3 w-32 h-32 object-contain"
                        alt="{{ $produk->nama_produk }}">
                    <h2 class="text-lg font-semibold text-gray-800">{{ $produk->nama_produk }}</h2>
                    <p class="text-sm text-gray-500">{{ $produk->kategori->nama_kategori ?? '-' }}</p>
                    <p class="text-babyblue font-bold text-lg mt-2">Rp{{ number_format($produk->harga, 0, ',', '.') }}</p>
                    <a href="{{ route('pesan.form', $produk->id) }}"
                    class="mt-3 inline-block bg-babyblue text-white px-4 py-2 rounded hover:bg-blue-400">
                    Pesan
                    </a>
                </div>
            @empty
                <p class="text-center text-gray-500 col-span-4">Tidak ada produk untuk kategori ini.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
