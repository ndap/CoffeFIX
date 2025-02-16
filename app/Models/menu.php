<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    protected $fillable = [
        'name',     // Nama menu
        'category', // Kategori menu
        'price',    // Harga menu
        'stock',    // Status stok (Available, Out of Stock)
        'image',    // Path gambar menu
    ];

    // Jika menggunakan waktu timestamp secara otomatis (created_at, updated_at)
    public $timestamps = true;
}
