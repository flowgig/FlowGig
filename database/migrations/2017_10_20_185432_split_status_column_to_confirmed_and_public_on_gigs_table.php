<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SplitStatusColumnToConfirmedAndPublicOnGigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gigs', function (Blueprint $table) {
            $table->boolean('confirmed')->default(false)->after('status');
            $table->boolean('public')->default(false)->after('confirmed');
        });

        DB::table('gigs')
            ->where('status', 'Settled')
            ->update(['confirmed' => true]);

        DB::table('gigs')
            ->where('status', 'Public')
            ->update(['public' => true]);

        Schema::table('gigs', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void|
     */
    public function down()
    {
        Schema::table('gigs', function (Blueprint $table) {
            $table->string('status', 50)->nullable()->after('location');
        });

        DB::table('gigs')
            ->where('confirmed', true)
            ->update(['status' => 'Settled']);

        DB::table('gigs')
            ->where('public', true)
            ->update(['status' => 'Public']);

        Schema::table('gigs', function (Blueprint $table) {
            $table->dropColumn('confirmed');
            $table->dropColumn('public');
        });
    }
}
