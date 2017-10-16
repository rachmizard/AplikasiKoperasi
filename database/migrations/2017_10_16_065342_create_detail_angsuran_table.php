<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailAngsuranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_angsuran', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tgl_jatuh_tempo');
            $table->string('besar_angsuran');
            $table->string('tgl_pembayaran');
            $table->string('angsuran_ke');
            $table->string('besar_angsuran');
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
        Schema::dropIfExists('detail_angsuran');
    }
}
