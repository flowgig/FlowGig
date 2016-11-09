<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        User::create([
            'name' => 'Bob Rocker',
            'email' => 'bob@flowgig.com',
            'password' => bcrypt('fender'),
        ]);

        User::create([
            'name' => 'Tina Sweeper',
            'email' => 'tina@flowgig.com',
            'password' => bcrypt('fender'),
        ]);
    }
}
