<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCreatedByAndUpdatedByForeignKeyColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bands', function (Blueprint $table) {
            $table->integer('created_by')->unsigned()->nullable()->after('id');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');

            $table->integer('updated_by')->unsigned()->nullable()->after('created_by');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
        });

        Schema::table('band_memberships', function (Blueprint $table) {
            $table->integer('created_by')->unsigned()->nullable()->after('id');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');

            $table->integer('updated_by')->unsigned()->nullable()->after('created_by');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
        });

        Schema::table('songs', function (Blueprint $table) {
            $table->integer('created_by')->unsigned()->nullable()->after('id');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');

            $table->integer('updated_by')->unsigned()->nullable()->nullable()->after('created_by');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
        });

        Schema::table('gigs', function (Blueprint $table) {
            $table->integer('created_by')->unsigned()->nullable()->after('id');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');

            $table->integer('updated_by')->unsigned()->nullable()->after('created_by');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
        });

        Schema::table('setlists', function (Blueprint $table) {
            $table->integer('created_by')->unsigned()->nullable()->after('id');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');

            $table->integer('updated_by')->unsigned()->nullable()->after('created_by');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
        });

        Schema::table('setlist_songs', function (Blueprint $table) {
            $table->integer('created_by')->unsigned()->nullable()->after('id');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');

            $table->integer('updated_by')->unsigned()->nullable()->after('created_by');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bands', function (Blueprint $table) {
            $table->dropForeign('bands_created_by_foreign');
            $table->dropColumn('created_by');

            $table->dropForeign('bands_updated_by_foreign');
            $table->dropColumn('updated_by');
        });

        Schema::table('band_memberships', function (Blueprint $table) {
            $table->dropForeign('band_memberships_created_by_foreign');
            $table->dropColumn('created_by');

            $table->dropForeign('band_memberships_updated_by_foreign');
            $table->dropColumn('updated_by');
        });

        Schema::table('songs', function (Blueprint $table) {
            $table->dropForeign('songs_created_by_foreign');
            $table->dropColumn('created_by');

            $table->dropForeign('songs_updated_by_foreign');
            $table->dropColumn('updated_by');
        });

        Schema::table('gigs', function (Blueprint $table) {
            $table->dropForeign('gigs_created_by_foreign');
            $table->dropColumn('created_by');

            $table->dropForeign('gigs_updated_by_foreign');
            $table->dropColumn('updated_by');
        });

        Schema::table('setlists', function (Blueprint $table) {
            $table->dropForeign('setlists_created_by_foreign');
            $table->dropColumn('created_by');

            $table->dropForeign('setlists_updated_by_foreign');
            $table->dropColumn('updated_by');
        });

        Schema::table('setlist_songs', function (Blueprint $table) {
            $table->dropForeign('setlist_songs_created_by_foreign');
            $table->dropColumn('created_by');

            $table->dropForeign('setlist_songs_updated_by_foreign');
            $table->dropColumn('updated_by');
        });
    }
}
