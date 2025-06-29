@extends('layouts.app')

@if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 text-center">
        {{ session('success') }}
    </div>
@endif

@section('content')
<div class="bg-white shadow-sm py-8">
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-babyblue">Bestie For U</h1>
    </div>

    {{-- Hair Care --}}
    <div class="container mx-auto px-4 mb-10">
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">Hair Care</h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6">
            @foreach($produks->filter(fn($p) => in_array(strtolower($p->nama_produk), ['shampoo', 'conditioner'])) as $produk)
                @include('components.produk-card', ['produk' => $produk])
            @endforeach
        </div>
    </div>

    {{-- Body Care --}}
    <div class="container mx-auto px-4 mb-10">
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">Body Care</h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6">
            @foreach($produks->filter(fn($p) => in_array(strtolower($p->nama_produk), ['body gel', 'perfume'])) as $produk)
                @include('components.produk-card', ['produk' => $produk])
            @endforeach
        </div>
    </div>

    {{-- Skin Care --}}
    <div class="container mx-auto px-4 mb-10">
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">Skin Care</h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6">
            @foreach($produks->filter(fn($p) => !in_array(strtolower($p->nama_produk), ['shampoo', 'conditioner', 'body gel', 'perfume'])) as $produk)
                @include('components.produk-card', ['produk' => $produk])
            @endforeach
        </div>
    </div>
</div>
@endsection
