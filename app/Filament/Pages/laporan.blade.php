<x-filament::page>
    <h2 class="text-2xl font-bold mb-4">📊 Ringkasan Laporan</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="bg-white p-4 shadow rounded">
            <div class="text-sm text-gray-500">Total Transaksi</div>
            <div class="text-2xl font-semibold">{{ $totalTransaksi }}</div>
        </div>
        <div class="bg-white p-4 shadow rounded">
            <div class="text-sm text-gray-500">Total Pemasukan</div>
            <div class="text-2xl font-semibold">Rp {{ number_format($totalPemasukan, 0, ',', '.') }}</div>
        </div>
    </div>

    <h3 class="text-xl font-semibold mb-2">🔥 Produk Terlaris</h3>
    <div class="bg-white p-4 shadow rounded">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b">
                    <th class="text-left p-2">#</th>
                    <th class="text-left p-2">Nama Produk</th>
                    <th class="text-left p-2">Total Terjual</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produkTerlaris as $i => $row)
                    <tr>
                        <td class="p-2">{{ $i + 1 }}</td>
                        <td class="p-2">{{ $row->produk->nama_produk ?? '-' }}</td>
                        <td class="p-2">{{ $row->total_terjual }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-filament::page>
