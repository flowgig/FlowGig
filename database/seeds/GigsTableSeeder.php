<?php

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

        factory(App\Gig::class, 50)->create();
    }
}
