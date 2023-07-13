<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class pembayaran extends Model
{
    use HasFactory;
    protected $table = 'tb_pembayaran';
    protected $primaryKey = 'id_pembayaran';
    protected $guarded = '[]';
    protected $fillable = [
        'id_pembayaran',
        'kode_transaksi',
        'tgl_pembayaran'
    ];
    public function pemesanan() :HasMany
    {
        return $this->hasMany(pemesanan::class, 'id_pembayaran', 'id_pembayaran');    
    }
}
