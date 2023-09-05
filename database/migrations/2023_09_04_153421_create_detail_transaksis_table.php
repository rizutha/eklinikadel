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
        Schema::create('detail_transaksis', function (Blueprint $table) {
            $table->increments('id_rincian_pembayaran');
            $table->integer('id_pembayaran')->unsigned();
            $table->foreign('id_pembayaran')->references('id_pembayaran')->on('transaksis');
            $table->integer('id_rawat_jalan')->unsigned();
            $table->foreign('id_rawat_jalan')->references('id_rawat_jalan')->on('rawat_jalans');
            $table->integer('id_detail_obat')->unsigned();
            $table->foreign('id_detail_obat')->references('id_detail_obat')->on('detail_obats');
            $table->date('tgl_pembayaran');
            $table->decimal('jumlah_pembayaran', 10, 2);
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_transaksis');
    }
};
