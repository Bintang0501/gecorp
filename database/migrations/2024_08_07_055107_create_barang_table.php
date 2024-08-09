<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('id_jenis_barang');
            $table->string('id_brand');
            $table->string('id_pembelian_barang');
            $table->dateTime('tgl_input');
            $table->string('nama_barang');
            $table->string('jenis_barang');
            $table->string('brand_barang');
            $table->integer('stock');
            $table->double('harga');
            $table->string('stock_fix');
            $table->string('stock_error');
        });
    }

};
