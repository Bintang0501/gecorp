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

    public $timestamps = false;

    protected $keyType = 'string';

    public $primaryKey = 'id';

    public function toko()
    {
        return $this->belongsTo(Toko::class, 'id_toko', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function levelusers()
    {
        return $this->belongsTo(LevelUser::class, 'id_level', 'id');
    }
}
