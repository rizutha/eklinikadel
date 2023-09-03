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
        Schema::create('rawat_jalan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('no_reg');
            $table->foreignId('kd_tindakan');
            $table->foreignId('kd_poli');
            $table->timestamps();

            $table->foreign('no_reg')->references('id')->on('pendaftaran')->onDelete('cascade');
            $table->foreign('kd_tindakan')->references('id')->on('tindakan')->onDelete('cascade');
            $table->foreign('kd_poli')->references('id')->on('poli')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rawat_jalan');
    }
};
