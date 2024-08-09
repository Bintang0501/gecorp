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
        Schema::create('level_harga', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('id_toko');
            $table->string('nama_level_harga');
            $table->string('nama_toko');
        });
    }

};
