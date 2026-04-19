<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'm_kategori';
    protected $primaryKey = 'kategori_id';
    public $timestamps = false;

    protected $fillable = [
        'kategori_kode',
        'kategori_nama'
    ];

    public function barang()
    {
        return $this->hasMany(Barang::class, 'kategori_id');
    }
}
