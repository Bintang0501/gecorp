<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pembelian_barang', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('id_supplier');
            $table->string('id_toko');
            $table->string('no_nota');
            $table->datetime('tgl_nota');
            $table->datetime('tgl_beli');
            $table->string('nama_supplier');
            $table->string('nama_barang');
            $table->string('jenis_barang');
            $table->string('brand_barang');
            $table->integer('jml_item');
            $table->double('total_harga');
            $table->string('nama_toko');
            $table->enum('status', ['progress', 'done', 'failed']);
        });
    }

};
