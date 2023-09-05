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
        Schema::create('rawat_jalans', function (Blueprint $table) {
            $table->increments('id_rawat_jalan');
            $table->integer('no_reg')->unsigned();
            $table->foreign('no_reg')->references('no_reg')->on('pendaftarans');
            $table->integer('id_tindakan')->unsigned();
            $table->foreign('id_tindakan')->references('id_tindakan')->on('tindakans');
            $table->integer('id_poli')->unsigned();
            $table->foreign('id_poli')->references('id_poli')->on('polis');
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
        Schema::dropIfExists('rawat_jalans');
    }
};
