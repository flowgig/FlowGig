<?php

use App\Gig;
use Carbon\Carbon;
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

        Gig::create([
            'created_by' => 2,
            'band_id' => 3,
            'name' => 'Tina\'s birthday party',
            'date' => Carbon::now()->addYear(),
            'venue' => 'Tina\'s garden',
            'location' => 'Nashville',
            'description' => 'Barbecue and Jam! Just bring your instrument :-)',
            'confirmed' => true,
            'public' => false,
        ]);

        factory(App\Gig::class, 50)->create();
    }
}
