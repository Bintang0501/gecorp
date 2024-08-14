<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailPembelianBarang extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'detail_pembelian_barang';

    // Disable default timestamps
    public $timestamps = false;

    protected $fillable = [
        'id_pembelian_barang',
        'id_jenis_barang',
        'id_brand',
        'nama_barang',
        'jenis_barang',
        'brand_barang',
        'harga_barang',
        'qty',
    ];

    public function pembelian()
    {
        return $this->belongsTo(PembelianBarang::class, 'id_pembelian_barang');
    }
}
