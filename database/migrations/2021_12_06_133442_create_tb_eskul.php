<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbEskul extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_eskul', function (Blueprint $table) {
            $table->id('id_eskul');
            $table->string('nama_eskul');
            $table->string('foto');
            $table->text('deskripsi');
            $table->enum('jenis', ['Wajib', 'Non Wajib']);
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
        Schema::dropIfExists('tb_eskul');
    }
}
