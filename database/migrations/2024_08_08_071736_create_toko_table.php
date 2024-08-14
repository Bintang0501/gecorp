<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('toko', function (Blueprint $table) {
<<<<<<< HEAD
            $table->id('id');
=======
            $table->id('id')->primary();
>>>>>>> c19ede8d5ddbc5db02ba6e610464257766e497b9
            $table->string('nama_toko');
            $table->string('wilayah');
            $table->text('alamat');
            $table->softDeletes();
        });
    }

};
