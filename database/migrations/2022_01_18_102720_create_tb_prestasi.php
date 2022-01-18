<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPrestasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_prestasi', function (Blueprint $table) {
            $table->id('id_prestasi');
            $table->string('bukti_foto');
            $table->string('nama_prestasi');
            $table->string('peringkat');
            $table->string('tingkat');
            $table->string('tahun_prestasi');
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
        Schema::dropIfExists('tb_prestasi');
    }
}
