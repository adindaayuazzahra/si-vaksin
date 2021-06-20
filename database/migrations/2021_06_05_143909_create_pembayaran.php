 status<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaksin.pembayaran', function (Blueprint $table) {
            $table->integer('id_pembayaran')->unsigned();
            $table->primary('id_pembayaran');
            $table->integer('id_pendaftaran')->unsigned();
            $table->foreign('id_pendaftaran')->references('id_pendaftaran')->on('vaksin.pendaftaran');
            $table->timestamp('tgl_pembayaran')->useCurrent();
            $table->text('total_harga');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembayaran');
    }
}
