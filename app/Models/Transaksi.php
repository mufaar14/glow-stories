<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    // Kalau kamu pakai fillable
    protected $guarded = [];

    // Relasi ke pelanggan
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
        return $this->hasMany(DetailTransaksi::class);
    }
}
