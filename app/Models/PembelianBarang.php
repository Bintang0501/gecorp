<?php
namespace App\Models;

use App\Http\Controllers\BarangController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PembelianBarang extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pembelian_barang';

    // Disable default timestamps
    public $timestamps = false;

    protected $fillable = [
        'id_users',
        'id_supplier',
        'id_toko',
        'no_nota',
        'tgl_nota',
        'tgl_beli',
        'nama_users',
        'nama_toko',
        'nama_supplier',
        'total_item',
        'total_harga',
        'status'
    ];

    public function detail()
    {
        return $this->hasMany(DetailPembelianBarang::class, 'id_pembelian_barang');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'id_supplier');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'id_brand');
    }
}
