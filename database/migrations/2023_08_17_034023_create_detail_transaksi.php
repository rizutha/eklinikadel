<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_transaksi', function (Blueprint $table) {
            $table->id();
            //$table->foreignid('id_pembayaran');
            //$table->foreignid('id_rawat_jalan');
            //$table->foreignid('id_detail_obat');
            //$table->integer('jumlah_pembayaran');
            //$table->foreignId('no_reg');
            $table->timestamps();

            //$table->foreign('id_pembayaran')->references('id')->on('transaksi')->onDelete('cascade');
            //$table->foreign('id_rawat_jalan')->references('id')->on('rawat_jalan')->onDelete('cascade');
            //$table->foreign('id_detail_obat')->references('id')->on('detail_obat')->onDelete('cascade');
            // $table->foreign('no_reg')->references('no_reg')->on('pendaftaran')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
