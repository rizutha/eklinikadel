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
        Schema::create('data_pasiens', function (Blueprint $table) {
            $table->integer('id')->unique();
            $table->string('no_rm', 255)->primary();
            $table->string('Nama_lengkap');
            $table->string('nik');
            $table->date('tgl_lahir');
            $table->integer('umur');
            $table->text('alamat');
            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->string('status');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pasiens');
    }
};
