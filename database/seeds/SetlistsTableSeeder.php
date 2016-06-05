<?php

use App\Setlist;
use Illuminate\Database\Seeder;

class SetlistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('setlists')->delete();

        Setlist::create(['title' => 'Christmas Gig']);

        Setlist::create(['title' => 'Studio, Best of album']);

        Setlist::create(['title' => 'Rehearsal, New Years Gig']);
    }
}
