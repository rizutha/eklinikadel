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
        Schema::create('detail_obats', function (Blueprint $table) {
            $table->increments('id_detail_obat');
            $table->integer('no_reg')->unsigned();
            $table->foreign('no_reg')->references('no_reg')->on('pendaftarans');
            $table->integer('id_obat')->unsigned();
            $table->foreign('id_obat')->references('id_obat')->on('obats');
            $table->integer('id_bungkus')->unsigned();
            $table->foreign('id_bungkus')->references('id_bungkus')->on('bungkus');
            $table->integer('qty');
            $table->decimal('subtotal', 10, 2);
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_obats');
    }
};
