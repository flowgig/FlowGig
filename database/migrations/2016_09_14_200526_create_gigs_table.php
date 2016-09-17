<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gigs', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->dateTime('date');
            $table->text('venue');
            $table->text('location');
            $table->boolean('confirmed');
            $table->integer('setlist_id')->unsigned();
            $table->timestamps();

            $table->foreign('setlist_id')->references('id')->on('setlists');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gigs');
    }
}
