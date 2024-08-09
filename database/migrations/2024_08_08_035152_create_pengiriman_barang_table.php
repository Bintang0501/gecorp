<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('pengiriman_barang', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama_pengirim');
            $table->string('toko_pengirim');
            $table->string('nama_penerima');
            $table->string('toko_penerima');
            $table->string('ekspedisi');
            $table->string('no_resi');
            $table->double('harga');
            $table->integer('item');
            $table->dateTime('tgl_kirim');
            $table->dateTime('tgl_terima');
            $table->enum('status', ['progress', 'done', 'failed']);
        });
    }

};
