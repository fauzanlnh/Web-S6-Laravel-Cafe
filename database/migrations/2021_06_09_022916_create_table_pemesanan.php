<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePemesanan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_pemesanan', function (Blueprint $table) {
            $table->increments('id_pemesanan');            
            $table->date('tanggal_pemesanan');
            $table->unsignedInteger('no_meja');
            $table->string('status_pembayaran');
            
            $table->unsignedInteger('total_pembayaran');
            $table->timestamps();
            //$table->foreign('no_meja')->references('no_meja')->on('table_meja');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_pemesanan');
    }
}
