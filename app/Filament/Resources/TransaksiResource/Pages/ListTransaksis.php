<?php

namespace App\Filament\Resources\TransaksiResource\Pages;

use App\Filament\Resources\TransaksiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Exports\TransaksiExport;
use Maatwebsite\Excel\Facades\Excel;
use Filament\Actions\Action;


class ListTransaksis extends ListRecords
{
    protected static string $resource = TransaksiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('Export Excel')
                ->label('Export ke Excel')
                ->icon('heroicon-m-arrow-down-tray')
                ->action(fn () => Excel::download(new TransaksiExport, 'transaksi.xlsx')),
        ];
    }
}
