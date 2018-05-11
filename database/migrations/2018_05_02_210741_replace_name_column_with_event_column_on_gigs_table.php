<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReplaceNameColumnWithEventColumnOnGigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gigs', function (Blueprint $table) {
            $table->string('event', 80)->nullable()->after('location');
        });

        // Moving all data from name column to event column:
        DB::table('gigs')->update(['event' => DB::raw('name')]);

        Schema::table('gigs', function (Blueprint $table) {
            $table->dropColumn('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gigs', function (Blueprint $table) {
            $table->string('name', 80)->after('band_id');
        });

        DB::table('gigs')->update(['name' => 'event']);

        Schema::table('gigs', function (Blueprint $table) {
            $table->dropColumn('event');
        });
    }
}
