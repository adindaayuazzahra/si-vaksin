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
            $table->string('img')->default('admin.svg');
            $table->text('nama_rs');
            $table->text('alamat');
            $table->text('provinsi');
            $table->text('keterangan');
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
        Schema::dropIfExists('rumah_sakit');
    }
}
