<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('toko', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('id_user');
            $table->string('id_barang');
            $table->string('id_jenis_barang');
            $table->string('id_brand');
            $table->string('nama_toko');
            $table->string('wilayah');
            $table->text('alamat');
            $table->string('nama_barang');
            $table->string('jenis_barang');
            $table->string('brand_barang');
            $table->double('harga');
            $table->integer('stock');
        });
    }

};
