<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftaranVaksin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaksin.pendaftaran', function (Blueprint $table) {
            $table->increments('id_pendaftaran');
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id_user')->on('vaksin.user');

            $table->integer('id_rs')->unsigned();
            $table->foreign('id_rs')->references('id_rs')->on('vaksin.rs');
            $table->integer('id_vaksin')->unsigned();
            $table->foreign('id_vaksin')->references('id_vaksin')->on('vaksin.vaksin');
            $table->date('tanggal_vaksinasi')->nullable();
            $table->time('jam_vaksinasi')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamp('tgl_pendaftaran')->useCurrent();
            $table->integer('id_status')->unsigned()->nullable();
            $table->foreign('id_status')->references('id_status')->on('vaksin.status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendaftaran');
    }
}
