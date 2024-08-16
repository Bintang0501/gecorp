<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('member', function (Blueprint $table) {
            $table->id('id')->primary();
            $table->string('id_toko');
            $table->string('id_level_harga');
            $table->string('id_level_user');
            $table->string('nama_member');
            $table->integer('report_transaksi')->nullable();
            $table->integer('idle')->nullable();
            $table->dateTime('last_transaksi')->nullable();
            $table->integer('bon')->nullable();
            $table->dateTime('tgl_registrasi')->nullable();
            $table->softDeletes();
        });
    }

};
