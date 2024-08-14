<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{

    use HasFactory, SoftDeletes;

    protected $table = 'brand';

    protected $fillable = ['nama_brand'];

    protected $keyType = 'string';

    public $primaryKey = 'id';

    public $timestamps = false;

}
