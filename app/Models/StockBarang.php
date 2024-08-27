<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

use function PHPUnit\Framework\returnSelf;

class StockBarang extends Model
{

    use HasFactory, SoftDeletes;

    protected $table = 'stock_barang';

    protected $fillable = ['id_pembelian_barang', 'id_barang', 'stock', 'harga_satuan', 'hpp_awal', 'hpp_baru', 'nilai_total'];

    protected $keyType = 'string';

    public $primaryKey = 'id';

    public $timestamps = false;

    public function barang()
    {
        return $this->hasMany(Barang::class, 'id_barang', 'id');
    }

    public function pembelianbarang()
    {
    return $this->belongsTo(PembelianBarang::class, 'id_pembelian_barang', 'id');
    }
}
