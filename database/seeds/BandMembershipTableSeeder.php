<?php

use App\Gig;
use Illuminate\Database\Seeder;

class BandMembershipTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('band_memberships')->delete();

        \App\BandMembership::create(['user_id' => 1, 'band_id' => 1, 'created_by' => 1]);
        \App\BandMembership::create(['user_id' => 1, 'band_id' => 2, 'created_by' => 1]);
    }
}
