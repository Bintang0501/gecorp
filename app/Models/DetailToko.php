<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailToko extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'detail_toko';

    protected $fillable = ['id_barang', 'nama_barang', 'id_toko', 'stock', 'harga'];

    protected $guarded = [''];

    public $incrementing = false;

    public $timestamps = false;

    protected $keyType = 'string';

    public $primaryKey = 'id';

    public function toko()
    {
        return $this->belongsTo(Toko::class, 'id_toko', 'id');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang', 'id');
    }

    public function stokBarang()
{
    return $this->hasMany(StockBarang::class, 'id_barang', 'id_barang');
}

}
