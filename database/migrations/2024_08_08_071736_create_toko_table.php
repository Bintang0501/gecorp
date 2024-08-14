<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('toko', function (Blueprint $table) {
            $table->id('id')->primary();
            $table->string('nama_toko');
            $table->string('wilayah');
            $table->text('alamat');
            $table->softDeletes();
        });
    }

};
