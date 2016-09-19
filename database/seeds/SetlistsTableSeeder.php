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

        $band1GigIds = \App\Gig::whereBandId(1)->pluck('id')->toArray();
        $band2GigIds = \App\Gig::whereBandId(2)->pluck('id')->toArray();

        Setlist::create([
            'title' => 'Rehearsal, New Years Gig',
            'band_id' => 1,
            'gig_id' => $band1GigIds[0],
        ]);

        Setlist::create([
            'title' => 'Christmas Gig',
            'band_id' => 1,
            'gig_id' => $band1GigIds[1]
        ]);

        Setlist::create([
            'title' => 'Studio, Best of album',
            'band_id' => 2,
            'gig_id' => $band2GigIds[0]
        ]);
    }
}
