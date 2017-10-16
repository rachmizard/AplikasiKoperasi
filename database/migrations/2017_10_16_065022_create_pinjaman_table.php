<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePinjamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pinjaman', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_pinjaman');
            $table->string('id_anggota');
            $table->string('besar_pinjaman');
            $table->string('tgl_pengajuan_peminjaman');
            $table->string('tgl_acc_peminjaman');
            $table->string('tgl_pinjaman');
            $table->string('tgl_pelunasan');
            $table->string('id_angsuran');
            $table->string('ket');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pinjaman');
    }
}
