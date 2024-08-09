<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('member', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('id_toko');
            $table->string('nama_member');
            $table->string('nama_toko');
            $table->integer('report_transaksi');
            $table->integer('idle');
            $table->dateTime('last_transaksi');
            $table->integer('bon');
            $table->dateTime('tgl_registrasi');
            $table->string('level_harga');
        });
    }

};
