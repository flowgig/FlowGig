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
            $table->integer('setlist_id')->unsigned();
            $table->integer('song_id')->unsigned();
            $table->integer('number_in_list')->unsigned();
            $table->integer('setnumber')->unsigned()->default(1);
            $table->text('key')->nullable();
            $table->integer('energy')->unsigned()->nullable();;
            $table->integer('duration')->unsigned()->nullable();
            $table->text('comment')->nullable();
            $table->timestamps();

            $table->primary(['setlist_id', 'song_id']);
            $table->foreign('setlist_id')->references('id')->on('setlists');
            $table->foreign('song_id')->references('id')->on('songs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('setlist_songs');
    }
}
