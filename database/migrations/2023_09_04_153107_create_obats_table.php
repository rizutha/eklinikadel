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
    Schema::create('obats', function (Blueprint $table) {
        $table->increments('id_obat');
        $table->date('tgl_input');
        $table->string('nama_obat');
        $table->integer('id_prod')->unsigned();
        $table->foreign('id_prod')->references('id_prod')->on('produsens');
        $table->integer('id_satuan')->unsigned();
        $table->foreign('id_satuan')->references('id_satuan')->on('satuans');
        $table->integer('id_batch')->unsigned();
        $table->foreign('id_batch')->references('id_batch')->on('batch_obats');
        $table->date('tgl_exp');
        $table->decimal('HNA', 10, 2);
        $table->decimal('PPN', 5, 2);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obats');
    }
};
