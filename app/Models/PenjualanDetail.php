<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenjualanDetail extends Model
{
    protected $table = 't_penjualan_detail';
    protected $primaryKey = 'detail_id';

    protected $fillable = [
        'penjualan_id',
        'barang_id',
        'harga',
        'jumlah'
    ];

    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class, 'penjualan_id');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }

    protected static function booted()
    {
        static::creating(function ($detail) {
            $stok = \App\Models\Stok::where('barang_id', $detail->barang_id)->first();

            if (!$stok) {
                throw new \Exception("Stok tidak ditemukan.");
            }

            if ($stok->stok_jumlah < $detail->jumlah) {
                throw new \Exception("Stok tidak mencukupi.");
            }
        });

        static::created(function ($detail) {
            $stok = \App\Models\Stok::where('barang_id', $detail->barang_id)->first();

            $stok->stok_jumlah -= $detail->jumlah;
            $stok->save();
        });

        static::updating(function ($detail) {
            $originalJumlah = $detail->getOriginal('jumlah');
            $selisih = $detail->jumlah - $originalJumlah;

            if ($selisih > 0) {
                $stok = \App\Models\Stok::where('barang_id', $detail->barang_id)->first();

                if (!$stok) {
                    throw new \Exception("Stok tidak ditemukan.");
                }

                if ($stok->stok_jumlah < $selisih) {
                    throw new \Exception("Stok tidak mencukupi saat update.");
                }
            }
        });

        static::updated(function ($detail) {
            $originalJumlah = $detail->getOriginal('jumlah');
            $selisih = $detail->jumlah - $originalJumlah;

            $stok = \App\Models\Stok::where('barang_id', $detail->barang_id)->first();

            if ($selisih > 0) {
                $stok->stok_jumlah -= $selisih;
            }

            if ($selisih < 0) {
                $stok->stok_jumlah += abs($selisih);
            }

            $stok->save();
        });

        static::deleted(function ($detail) {
            $stok = \App\Models\Stok::where('barang_id', $detail->barang_id)->first();

            if ($stok) {
                $stok->stok_jumlah += $detail->jumlah;
                $stok->save();
            }
        });
    }
}