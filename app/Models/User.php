<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'm_user';
    protected $primaryKey = 'user_id';
    public $timestamps = false;

    protected $fillable = [
        'level_id',
        'username',
        'email',
        'nama',
        'password'
    ];

    public function getNameAttribute()
    {
        return $this->nama;
    }

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];


    // RELASI
    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }

    public function penjualan()
    {
        return $this->hasMany(Penjualan::class, 'user_id');
    }

    public function stok()
    {
        return $this->hasMany(Stok::class, 'user_id');
    }
}