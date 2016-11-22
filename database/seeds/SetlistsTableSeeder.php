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
            'gig_id' => 1 // system gig, band 1
        ]);

        Setlist::create([
            'gig_id' => 2 // system gig, band 2
        ]);

        Setlist::create([
            'gig_id' => 3 // normal gig, band 1
        ]);
    }
}
