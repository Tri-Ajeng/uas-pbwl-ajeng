<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'tb_transaksi';
    protected $primaryKey = 'transaksi_id';
    protected $guarded = '[]';
    protected $fillable = [
        'transaksi_id',
        'transaksi_id_pelanggan',
        'transaksi_tanggal'
    ];
    public function pelanggan() :BelongsTo
    {
        return $this->belongsTo(Pelanggan::class, 'transaksi_id_pelanggan');    
    }
}
