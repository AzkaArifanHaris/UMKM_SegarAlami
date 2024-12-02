<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    use HasFactory;
    protected $table = 'produk';

    public $timestamps = false;

    protected $fillable = [
        'nama_produk',
        'harga',
        'deskripsi',
        'gambar',

    ];
}
