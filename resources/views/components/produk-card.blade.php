<div class="bg-white rounded-lg shadow hover:shadow-md p-4 text-center">
    <img src="{{ asset('storage/' . $produk->gambar) }}"
        class="mx-auto mb-3 w-32 h-32 object-contain"
        alt="{{ $produk->nama_produk }}">
    <h2 class="text-lg font-semibold text-gray-800">{{ $produk->nama_produk }}</h2>
    <p class="text-sm text-gray-500">{{ $produk->kategori->nama_kategori ?? '-' }}</p>
    <p class="text-babyblue font-bold text-lg mt-2">Rp{{ number_format($produk->harga, 0, ',', '.') }}</p>
    <button class="mt-3 bg-babyblue text-white px-4 py-2 rounded hover:bg-blue-400">Pesan</button>
</div>
