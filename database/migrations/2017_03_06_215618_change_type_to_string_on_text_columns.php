<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeTypeToStringOnTextColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bands', function (Blueprint $table) {
            $table->string('name', 80)->change();
        });

        Schema::table('songs', function (Blueprint $table) {
            $table->string('title', 80)->change();
            $table->string('artist', 80)->change();
            $table->string('music_by', 80)->change();
            $table->string('lyrics_by', 80)->change();
            $table->string('key', 3)->change();
        });

        Schema::table('gigs', function (Blueprint $table) {
            $table->string('name', 80)->change();
            $table->string('venue', 80)->change();
            $table->string('location', 80)->change();
        });

        Schema::table('setlist_songs', function (Blueprint $table) {
            $table->string('key', 3)->change();
            $table->string('comment', 100)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('setlist_songs', function (Blueprint $table) {
            $table->text('key')->change();
            $table->text('comment')->change();
        });

        Schema::table('gigs', function (Blueprint $table) {
            $table->text('name')->change();
            $table->text('venue')->change();
            $table->text('location')->change();
        });

        Schema::table('songs', function (Blueprint $table) {
            $table->text('title')->change();
            $table->text('artist')->change();
            $table->text('music_by')->change();
            $table->text('lyrics_by')->change();
            $table->text('key')->change();
        });

        Schema::table('bands', function (Blueprint $table) {
            $table->text('name')->change();
        });
    }
}
