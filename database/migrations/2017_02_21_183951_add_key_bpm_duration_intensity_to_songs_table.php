<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddKeyBpmDurationIntensityToSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('songs', function (Blueprint $table) {
            $table->text('key')->nullable()->after('lyrics_by');
            $table->integer('bpm')->unsigned()->nullable()->after('key');
            $table->integer('duration')->unsigned()->nullable()->after('bpm');
            $table->integer('intensity')->unsigned()->nullable()->after('duration');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('songs', function (Blueprint $table) {
            $table->dropColumn(['intensity', 'duration', 'bpm', 'key']);
        });
    }
}
