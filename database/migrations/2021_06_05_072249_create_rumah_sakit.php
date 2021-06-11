<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRumahSakit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaksin.rs', function (Blueprint $table) {
            $table->increments('id_rs');
            $table->string('img')->nullable();
            $table->text('nama_rs');
            $table->text('alamat');
            $table->text('jadwal');
            $table->text('keterangan')->nullable();
            $table->text('no_telephone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rs');
    }
}
