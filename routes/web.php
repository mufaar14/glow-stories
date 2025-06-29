<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Exports\TransaksiExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\TransaksiController;
use App\Exports\LaporanExport;

Route::get('/transaksi/export', function () {
    return Excel::download(new TransaksiExport, 'data-transaksi.xlsx');
})->name('transaksi.export');

Route::get('/laporan/export', function () {
    return Excel::download(new LaporanExport, 'laporan.xlsx');
})->name('laporan.export');

Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');

Route::get('/', [FrontendController::class, 'index']);
Route::get('/kategori/{group}', [FrontendController::class, 'filter']);

Route::get('/pesan/{id}', [PembelianController::class, 'form'])->name('pesan.form');
Route::post('/pesan', [PembelianController::class, 'simpan'])->name('pesan.simpan');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/export-transaksi', function () {
    return Excel::download(new TransaksiExport, 'transaksi.xlsx');
});

require __DIR__.'/auth.php';
