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
<<<<<<< HEAD:database/migrations/2023_09_04_152830_create_produsens_table.php
        Schema::create('produsens', function (Blueprint $table) {
            $table->increments('id_prod');
            $table->string('nama_prod');
=======
        Schema::create('kemasan', function (Blueprint $table) {
            $table->id();
            $table->varchar('jenis_bungkus');
            $table->integer('harga_bungkus');
>>>>>>> a354bb097d327c58f205bbdb959ebf9b5f9cbe5e:database/migrations/2023_09_03_131917_create_kemasan.php
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produsens');
    }
};
