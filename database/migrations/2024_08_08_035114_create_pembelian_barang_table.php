<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pembelian_barang', function (Blueprint $table) {
            $table->id('id');
            $table->string('id_users')->nullable();
            $table->string('id_supplier');
            $table->string('id_toko');
            $table->string('no_nota')->nullable();
            $table->dateTime('tgl_nota')->nullable();
            $table->dateTime('tgl_beli')->nullable();
            $table->string('nama_users')->nullable();
            $table->string('nama_toko')->nullable();
            $table->string('nama_supplier')->nullable();
            $table->integer('total_item')->nullable();
            $table->double('total_harga')->nullable();
            $table->enum('status', ['progress', 'done', 'failed'])->default('progress');
            $table->softDeletes();
        });
    }

};
