<?php

use App\Gig;
use Illuminate\Database\Seeder;

class GigsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gigs')->delete();

        Gig::create(['name' => '_system_', 'band_id' => '1']);
        Gig::create(['name' => '_system_', 'band_id' => '2']);

        factory(App\Gig::class, 50)->create();
    }
}
