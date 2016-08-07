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

        Setlist::create([
            'title' => 'Rehearsal, New Years Gig',
            'band_id' => 1
        ]);

        Setlist::create([
            'title' => 'Christmas Gig',
            'band_id' => 1
        ]);

        Setlist::create([
            'title' => 'Studio, Best of album',
            'band_id' => 2
        ]);
    }
}
