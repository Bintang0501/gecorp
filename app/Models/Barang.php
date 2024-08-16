<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barang extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'barang';

    protected $guarded = [''];

    public $incrementing = false;

    public $timestamps = false;

    protected $keyType = 'string';

    public $primaryKey = 'id';

    public function detail(): BelongsTo
    {
        return $this->belongsTo(DetailPembelianBarang::class, 'id', 'nama_barang', 'brand_barang', 'jenis_barang', 'harga_barang');
    }
    public function pembelian(): BelongsTo
    {
        return $this->belongsTo(PembelianBarang::class, 'id', 'status');
    }

}
