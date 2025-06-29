<?php

namespace App\Exports;

use App\Models\Transaksi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TransaksiExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Transaksi::with('pelanggan')->get()->map(function ($transaksi) {
            return [
                'No Invoice'   => $transaksi->no_invoice,
                'Tanggal'      => $transaksi->tanggal,
                'Pelanggan'    => $transaksi->pelanggan->nama ?? '-',
                'Total'        => $transaksi->total,
            ];
        });
    }

    public function headings(): array
    {
        return ['No Invoice', 'Tanggal', 'Pelanggan', 'Total'];
    }
}
