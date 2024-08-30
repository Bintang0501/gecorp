<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('pengiriman_barang', function (Blueprint $table) {
            $table->id('id');
            $table->string('no_resi');
            $table->string('toko_pengirim');
            $table->string('nama_pengirim');
            $table->string('nama_barang');
            $table->string('ekspedisi');
            $table->integer('qty');
            $table->double('total_harga');
            $table->string('toko_penerima');
            $table->date('tgl_kirim');
            $table->date('tgl_terima')->nullable();
            $table->enum('status', ['progress', 'done', 'failed'])->default('progress');
            $table->softDeletes();
        });
    }

};
