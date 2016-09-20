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
            'gig_id' => $band1GigIds[0],
        ]);

        Setlist::create([
            'gig_id' => $band1GigIds[1]
        ]);

        Setlist::create([
            'gig_id' => $band2GigIds[0]
        ]);
    }
}
