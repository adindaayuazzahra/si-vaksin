<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInformation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaksin.informasi_user', function (Blueprint $table) {
            $table->increments('id_informasi');
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id_user')->on('vaksin.user')->onDelete('cascade')->onUpdate('cascade');
            $table->text('nik');
            $table->text('nama');
            $table->text('alamat');
            $table->timestamp('tgl_verifikasi')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('tgl_update')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('informasi_user');
    }
}
