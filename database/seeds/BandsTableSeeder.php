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

        Band::create(['name' => 'The Wurlitzers']);

        Band::create(['name' => 'Roy\'s Equation']);
    }
}
