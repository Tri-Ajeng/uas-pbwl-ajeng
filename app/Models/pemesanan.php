<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class pemesanan extends Model
{
    use HasFactory;
    protected $table = 'tb_pemesanan';
    protected $primaryKey = 'id_pemesanan';
    protected $guarded = '[]';
    protected $fillable = [
        'id_pemesanan',
        'id_pelanggan',
        'id_pembayaran',
        'jumlah_pesanan'
    ];
    public function pelanggan() :BelongsTo
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan', 'id_pelanggan');    
    }
    public function pembayaran() :BelongsTo
    {
        return $this->belongsTo(pembayaran::class, 'id_pembayaran', 'id_pembayaran');    
    }
}
