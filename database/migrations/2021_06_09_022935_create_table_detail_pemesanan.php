<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDetailPemesanan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_detail_pemesanan', function (Blueprint $table) {
            $table->increments('id_detail');
            $table->string('status_pemesanan');
            $table->unsignedInteger('id_pemesanan');
            $table->unsignedInteger('id_menu');
            $table->unsignedInteger('jumlah_pesan');
            $table->unsignedInteger('total_detail');
            $table->timestamps();
            //$table->foreign('id_pemesanan')->references('id_pemesanan')->on('table_pemesanan');
            //$table->foreign('id_menu')->references('id_menu')->on('table_menu');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_detail_pemesanan');
    }
}
