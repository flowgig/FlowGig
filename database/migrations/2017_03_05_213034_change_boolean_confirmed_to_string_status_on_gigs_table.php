<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeBooleanConfirmedToStringStatusOnGigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gigs', function (Blueprint $table) {
            $table->renameColumn('confirmed', 'status');
        });

        Schema::table('gigs', function (Blueprint $table) {
            $table->string('status', 50)->nullable()->change();
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
            $table->boolean('status')->change();
        });

        Schema::table('gigs', function (Blueprint $table) {
            $table->renameColumn('status', 'confirmed');
        });
    }
}
