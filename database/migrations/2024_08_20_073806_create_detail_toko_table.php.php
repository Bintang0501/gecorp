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
        Schema::create('detail_toko', function (Blueprint $table) {
            $table->id();
            $table->string('id_toko')->nullable();
            $table->string('id_barang')->nullable();
            $table->string('stock')->nullable();
            $table->string('harga')->nullable();
            $table->softDeletes()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
