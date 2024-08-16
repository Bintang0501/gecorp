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
        Schema::create('detail_pembelian_barang', function (Blueprint $table) {
            $table->id('id');
            $table->string('id_pembelian_barang')->nullable();
            $table->string('id_jenis_barang')->nullable();
            $table->string('id_brand')->nullable();
            $table->string('nama_barang')->nullable();
            $table->string('jenis_barang')->nullable();
            $table->string('brand_barang')->nullable();
            $table->double('harga_barang')->nullable();
            $table->integer('qty')->nullable();
            $table->enum('status', ['done', 'failed', 'progress', 'refund', 'resend'])->default('progress')->nullable();
            $table->softDeletes();
        });
    }

};
