<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenjualanDetail extends Model
{
    protected $table = 't_penjualan_detail';
    protected $primaryKey = 'detail_id';
    public $timestamps = false;

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
        // SAAT CREATE
        static::created(function ($detail) {
            $stok = \App\Models\Stok::where('barang_id', $detail->barang_id)->first();

            if (!$stok) {
                throw new \Exception("Stok untuk barang_id {$detail->barang_id} tidak ditemukan.");
            }

            if ($stok->stok_jumlah < $detail->jumlah) {
                throw new \Exception("Stok tidak mencukupi untuk barang_id {$detail->barang_id}. Stok tersedia: {$stok->stok_jumlah}.");
            }

                $stok->stok_jumlah -= $detail->jumlah;
                $stok->save();
        });

        // SAAT UPDATE
        static::updated(function ($detail) {
            $originalJumlah = $detail->getOriginal('jumlah');
            $selisih = $detail->jumlah - $originalJumlah;

            $stok = \App\Models\Stok::where('barang_id', $detail->barang_id)->first();

            if (!$stok) {
                throw new \Exception("Stok tidak ditemukan.");
            }

            // kalau penambahan jumlah (misalnya 5 → 10)
            if ($selisih > 0) {
                if ($stok->stok_jumlah < $selisih) {
                    throw new \Exception("Stok tidak mencukupi saat update.");
                }

                $stok->stok_jumlah -= $selisih;
            }

            // kalau pengurangan jumlah (misalnya 10 → 5)
            if ($selisih < 0) {
                $stok->stok_jumlah += abs($selisih);
            }

            $stok->save();
        });

        // SAAT DELETE
        static::deleted(function ($detail) {
            $stok = \App\Models\Stok::where('barang_id', $detail->barang_id)->first();

            if ($stok) {
                $stok->stok_jumlah += $detail->jumlah;
                $stok->save();
            }
        });
    }
}