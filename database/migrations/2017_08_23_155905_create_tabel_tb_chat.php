<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabelTbChat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_chat', function (Blueprint $table) {
            $table->increments('id');
            $table->string('body');
            $table->integer('author_id')->unsigned();
            $table->integer('room_chat_id')->unsigned();
            $table->foreign('room_chat_id')->references('id')->on('tb_room_chat')->onDelete('cascade');
            $table->foreign('author_id') ->references('id')->on('users') ->onDelete('cascade');
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
        Schema::dropIfExists('tb_chat');
    }
}
