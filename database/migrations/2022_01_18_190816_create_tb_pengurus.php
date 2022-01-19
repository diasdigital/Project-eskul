<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPengurus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pengurus', function (Blueprint $table) {
            $table->id('id_pengurus');
            $table->string('nama_pembina')->nullable();
            $table->foreignId('id_eskul');
            $table->foreignId('id_ketua')->nullable();
            $table->foreignId('id_wakil')->nullable();
            $table->foreignId('id_sekretaris')->nullable();
            $table->foreignId('id_bendahara')->nullable();
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
        Schema::dropIfExists('tb_pengurus');
    }
}
