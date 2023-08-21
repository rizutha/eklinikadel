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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelanggan');
            $table->string('alamat');
            $table->string('metode_pembayaran')->default('non bpjs');
            $table->integer('total_pembayaran');
            $table->integer('jumlah_dibayar');
            $table->integer('Sisa_pembayaran');
            $table->string('status_pembayaran')->default('belum lunas');
            $table->foreignId('id_kasir');
            // $table->foreignId('no_reg');
            $table->timestamps();

            $table->foreign('id_kasir')->references('id')->on('kasir')->onDelete('cascade');
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
