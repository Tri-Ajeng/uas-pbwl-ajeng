<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stokproduk extends Model
{
    use HasFactory;
    protected $table = 'tb_stokproduk';
    protected $primaryKey = 'id_produk';
    protected $guarded = '[]';
    protected $fillable = [
        'id_produk',
        'tgl_pembuatan',
        'stok_barang'
    ];
    use HasFactory;
}
