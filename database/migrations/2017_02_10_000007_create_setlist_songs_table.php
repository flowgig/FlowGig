<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSetlistSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setlist_songs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('setlist_id')->unsigned();
            $table->integer('song_id')->unsigned();
            $table->integer('number_in_list')->unsigned();
            $table->text('key')->nullable();
            $table->integer('bpm')->unsigned()->nullable();
            $table->integer('duration')->unsigned()->nullable();
            $table->integer('intensity')->unsigned()->nullable();
            $table->text('comment')->nullable();
            $table->timestamps();

            $table->foreign('setlist_id')->references('id')->on('setlists')->onDelete('cascade');
            $table->foreign('song_id')->references('id')->on('songs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('setlist_songs');
    }
}
