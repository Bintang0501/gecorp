<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PengirimanBarang extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pengiriman_barang';

    protected $fillable = [
        'no_resi', 'toko_pengirim', 'nama_pengirim', 'nama_barang', 'ekspedisi', 'qty', 'total_harga', 'toko_penerima', 'tgl_kirim'
    ];

    public $incrementing = false;

    public $timestamps = false;

    protected $keyType = 'string';

    public $primaryKey = 'id';

    public function toko()
    {
        return $this->belongsTo(Toko::class, 'toko_pengirim', 'id');
    }

    public function tokos()
    {
        return $this->belongsTo(Toko::class, 'toko_penerima', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'nama_pengirim', 'id');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'nama_barang', 'id');
    }
}
