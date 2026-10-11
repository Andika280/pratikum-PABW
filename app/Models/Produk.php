<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    //
    protected $table = 'produk';
    protected $fillable = ['kategori_id', 'nama_produk', 'harga_per_kg', 'stok_kg', 'deskripsi'];
}
