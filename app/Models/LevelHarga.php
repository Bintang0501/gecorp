<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LevelHarga extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'level_harga';

    protected $guarded = [''];

    public $incrementing = false;

    public $timestamps = false;

    protected $keyType = 'string';

    public $primaryKey = 'id';

}
