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
        Schema::dropIfExists('obat');
    }
};
