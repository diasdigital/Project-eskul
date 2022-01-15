<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbAnggota extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_anggota', function (Blueprint $table) {
            $table->id('id_anggota');
            $table->string('nis');
            $table->string('nama_anggota');
            $table->string('tahun_gabung');
            $table->foreignId('id_jurusan');
            $table->foreignId('id_eskul');
            $table->timestamp('waktu_buat');
            $table->timestamp('waktu_ubah');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_anggota');
    }
}
