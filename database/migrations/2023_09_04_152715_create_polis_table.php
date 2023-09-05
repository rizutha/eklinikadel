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
<<<<<<< HEAD:database/migrations/2023_09_04_152715_create_polis_table.php
        Schema::create('polis', function (Blueprint $table) {
            $table->increments('id_poli');
            $table->string('nm_poli');
=======
        Schema::create('obat', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_input');
            $table->varchar('nama_obat');
            $table->foreignId('id_prod');
            $table->foreignId('id_satuan');
            $table->foreignId('id_batch');
            $table->date('tgl_exp');
            $table->integer('HNA');
            $table->integer('PPN');
>>>>>>> a354bb097d327c58f205bbdb959ebf9b5f9cbe5e:database/migrations/2023_08_17_033556_create_obat.php
            $table->timestamps();

            $table->foreign('id_prod')->references('id')->on('produsen')->onDelete('cascade');
            $table->foreign('id_satuan')->references('id')->on('satuan')->onDelete('cascade');
            $table->foreign('id_batch')->references('id')->on('batch_obat')->onDelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('polis');
    }
};
