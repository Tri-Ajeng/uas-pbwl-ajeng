<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pelanggan extends Model
{
    use HasFactory;
    protected $table = 'tb_pelanggan';
    protected $primaryKey = 'id_pelanggan';
    protected $guarded = '[]';
    protected $fillable = [
        'id_pelanggan',
        'nama_pelanggan'
    ];
    public function pemesanan() :HasMany
    {
        return $this->hasMany(pemesanan::class, 'id_pelanggan', 'id_pelanggan');    
    }
}
