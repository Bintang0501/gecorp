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

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'id_brand_barang');
    }
    public function jenis(): BelongsTo
    {
        return $this->belongsTo(JenisBarang::class, 'id_jenis_barang');
    }

}
