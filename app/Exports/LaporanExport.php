<?php

namespace App\Exports;

use App\Models\DetailTransaksi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LaporanExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return DetailTransaksi::with(['produk', 'transaksi.pelanggan'])
            ->get()
            ->map(function ($item) {
                return [
                    'tanggal'    => optional($item->transaksi)->tanggal,
                    'pelanggan'  => optional($item->transaksi->pelanggan)->nama,
                    'produk'     => optional($item->produk)->nama_produk,
                    'qty'        => $item->qty,
                    'harga'      => $item->harga,
                    'subtotal'   => $item->subtotal,
                ];
            });
    }

    public function headings(): array
    {
        return ['Tanggal', 'Pelanggan', 'Produk', 'Qty', 'Harga', 'Subtotal'];
    }
}
