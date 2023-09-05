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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->increments('id_pembayaran');
            $table->date('tgl_pembayaran');
            $table->string('nama_pelanggan');
            $table->text('alamat');
            $table->string('metode_pembayaran');
            $table->decimal('total_pembayaran', 10, 2);
            $table->decimal('jml_dibayar', 10, 2);
            $table->decimal('sisa_pembayaran', 10, 2);
            $table->string('status_pembayaran');
            $table->integer('id_kasir')->unsigned();
            $table->foreign('id_kasir')->references('id_kasir')->on('kasirs');
            $table->integer('no_reg')->unsigned();
            $table->foreign('no_reg')->references('no_reg')->on('pendaftarans');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
