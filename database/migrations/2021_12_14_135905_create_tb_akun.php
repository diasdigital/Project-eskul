<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbAkun extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_akun', function (Blueprint $table) {
            $table->id('id_akun');
            $table->string('username');
            $table->string('password');
            $table->string('nama');
            $table->enum('level', ['Admin', 'Petugas']);
            $table->foreignId('id_eskul')->nullable();
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
        Schema::dropIfExists('tb_akun');
    }
}
