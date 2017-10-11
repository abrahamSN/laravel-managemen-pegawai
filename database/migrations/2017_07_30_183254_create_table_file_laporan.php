<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFileLaporan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_file_laporan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('laporan_id')->unsigned();
            $table->string('filename');
            $table->timestamps();

            $table->foreign('laporan_id')->references('id')->on('tb_laporan')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_file_laporan');
    }
}
