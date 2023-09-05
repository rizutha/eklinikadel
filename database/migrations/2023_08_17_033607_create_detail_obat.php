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
        Schema::create('detail_obat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('no_reg');
            $table->foreignId('id_obat');
            $table->foreignId('id_kemasan');
            $table->integer('qty');
            $table->integer('subtotal');
            $table->timestamps();

            $table->foreign('no_reg')->references('id')->on('pendaftaran')->onDelete('cascade');
            $table->foreign('id_obat')->references('id')->on('obat')->onDelete('cascade');
            $table->foreign('id_kemasan')->references('id')->on('kemasan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kemasan');
    }
};
