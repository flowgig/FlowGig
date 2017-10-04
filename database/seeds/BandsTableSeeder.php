<?php

use App\Band;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bands')->delete();

        Band::create(['name' => 'The Wurlitzers', 'created_by' => 1]);

        Band::create(['name' => 'Roy\'s Equation', 'created_by' => 1]);

        Band::create(['name' => 'Cucumbersomes', 'created_by' => 2]);
    }
}
