<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = 't_penjualan';
    protected $primaryKey = 'penjualan_id';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'pembeli',
        'penjualan_kode',
        'penjualan_tanggal'
    ];

    protected $casts = [
        'penjualan_tanggal' => 'datetime',
    ];

    protected static function booted()
    {
        static::deleting(function ($penjualan) {

            foreach ($penjualan->detail as $detail) {
                $stok = \App\Models\Stok::where('barang_id', $detail->barang_id)->first();

                if ($stok) {
                    $stok->stok_jumlah += $detail->jumlah;
                    $stok->save();
                }
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function detail()
    {
        return $this->hasMany(PenjualanDetail::class, 'penjualan_id');
    }
}
