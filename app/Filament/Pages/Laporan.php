<?php

namespace App\Filament\Pages;

use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use App\Models\Pelanggan;
use App\Models\Produk;
use Filament\Pages\Page;
use Filament\Actions\Action;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LaporanExport;

class Laporan extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-chart-bar-square';
    protected static string $view = 'filament.pages.laporan';

    public $totalTransaksi;
    public $totalPemasukan;
    public $produkTerlaris;

    public function mount(): void
    {
        $this->totalTransaksi = Transaksi::count();
        $this->totalPemasukan = Transaksi::sum('total');

        $this->produkTerlaris = DetailTransaksi::selectRaw('produk_id, SUM(qty) as total_terjual')
            ->groupBy('produk_id')
            ->orderByDesc('total_terjual')
            ->with('produk')
            ->limit(5)
            ->get();
    }

  
    protected function getHeaderActions(): array
    {
        return [
            // Tombol 1: Export Data Transaksi (mentah)
            Action::make('ExportExcel')
                ->label('Export Data Transaksi')
                ->icon('heroicon-o-document-arrow-down')
                ->url(route('transaksi.export')) // route export mentah
                ->openUrlInNewTab(),
    
            // Tombol 2: Export Laporan Ringkasan
            Action::make('ExportLaporan')
                ->label('Export Laporan Excel')
                ->icon('heroicon-o-chart-bar-square')
                ->url(route('laporan.export')) // route laporan ringkasan
                ->openUrlInNewTab(),
        ];
    }
}
