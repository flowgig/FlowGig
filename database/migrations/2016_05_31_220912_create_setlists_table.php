<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSetlistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setlists', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('band_id')->unsigned();
            $table->text('title');
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('band_id')->references('id')->on('bands');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('setlists');
    }
}
