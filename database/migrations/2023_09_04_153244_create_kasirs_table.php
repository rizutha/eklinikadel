<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('kasirs', function (Blueprint $table) {
            $table->increments('id_kasir');
            $table->string('nama_kasir');
            $table->string('username');
            $table->string('password');
            $table->string('nama');
            $table->string('no_handphone');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kasirs');
    }
};
