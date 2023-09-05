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
        Schema::create('batch_obats', function (Blueprint $table) {
            $table->increments('id_batch');
            $table->decimal('harga_beli', 10, 2);
            $table->integer('jumlah_masuk');
            $table->decimal('harga_jual', 10, 2);
            $table->integer('stok');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('batch_obats');
    }
};
