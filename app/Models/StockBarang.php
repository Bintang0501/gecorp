<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StockBarang extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'stock_barang';

    protected $guarded = [''];

    public $incrementing = false;

    protected $keyType = 'string';

    public $timestamps = false;

    public $primaryKey = 'id';
}
