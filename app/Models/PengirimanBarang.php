<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PengirimanBarang extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pengiriman_barang';

    protected $guarded = [''];

    public $incrementing = false;

    protected $keyType = 'string';

    public $primaryKey = 'id';
}
