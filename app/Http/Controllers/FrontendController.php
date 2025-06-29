<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function index()
    {
        $produks = Produk::with('kategori')->latest()->get();
        return view('frontend.home', compact('produks'));
    }

    public function filter($group)
    {
        $group = strtolower($group);
        
        $produkFilter = match ($group) {
            'hair-care' => ['shampoo', 'conditioner'],
            'body-care' => ['body gel', 'perfume'],
            'skin-care' => ['face wash', 'serum', 'moisturizer', 'sun screen'],
            default => [],
        };

        $produks = Produk::with('kategori')
            ->where(function ($query) use ($produkFilter) {
                foreach ($produkFilter as $item) {
                    $query->orWhere(DB::raw('LOWER(nama_produk)'), $item);
                }
            })
            ->latest()
            ->get();

        return view('frontend.home', compact('produks'));
    }
}
