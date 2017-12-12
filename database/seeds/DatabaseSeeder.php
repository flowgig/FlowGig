<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(BandsTableSeeder::class);
        $this->call(BandMembershipTableSeeder::class);
        $this->call(SongsTableSeeder::class);
        $this->call(GigsTableSeeder::class);
        $this->call(SetlistsTableSeeder::class);
        $this->call(SetlistSongsTableSeeder::class);
        $this->call(InvitationsTableSeeder::class);
        $this->call(LinksTableSeeder::class);
    }
}
