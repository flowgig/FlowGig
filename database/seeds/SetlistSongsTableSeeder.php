<?php

use App\SetlistSong;
use Illuminate\Database\Seeder;

class SetlistSongsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('setlist_songs')->truncate();

        SetlistSong::create(['setlist_id' => 1, 'song_id' => 1, 'number_in_list' => 1, 'setnumber' => 1]);

        SetlistSong::create(['setlist_id' => 1, 'song_id' => 2, 'number_in_list' => 2, 'setnumber' => 1]);

        SetlistSong::create(['setlist_id' => 1, 'song_id' => 3, 'number_in_list' => 3, 'setnumber' => 2]);

        SetlistSong::create(['setlist_id' => 1, 'song_id' => 4, 'number_in_list' => 4, 'setnumber' => 2]);
    }
}
