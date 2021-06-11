<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenisVaksin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaksin.vaksin', function (Blueprint $table) {
            $table->increments('id_vaksin');
            $table->string('img')->nullable();
            $table->text('nama_vaksin');
            $table->text('deskripsi')->nullable();
            $table->text('harga');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vaksin');
    }
}
