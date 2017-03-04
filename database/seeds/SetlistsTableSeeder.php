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
            'gig_id' => 1,
            'created_by' => 1
        ]);
    }
}
