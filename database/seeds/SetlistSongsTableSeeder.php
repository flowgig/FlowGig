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

        // Default values SetlistSong
        SetlistSong::create(['setlist_id' => 1, 'song_id' => 1, 'number_in_list' => 1,
            'key' => 'C', 'bpm' => 60, 'duration' => 160, 'intensity' => 6, 'comment' => 'Some comment ...']);
        // Default values SetlistSong
        SetlistSong::create(['setlist_id' => 1, 'song_id' => 2, 'number_in_list' => 2,
            'key' => 'D', 'bpm' => 70, 'duration' => 170, 'intensity' => 7, 'comment' => 'Some comment ...']);

        SetlistSong::create(['setlist_id' => 2, 'song_id' => 3, 'number_in_list' => 1,
            'key' => 'E', 'bpm' => 80, 'duration' => 180, 'intensity' => 8, 'comment' => 'Some comment ...']);

        SetlistSong::create(['setlist_id' => 2, 'song_id' => 4, 'number_in_list' => 2,
            'key' => 'F', 'bpm' => 90, 'duration' => 190, 'intensity' => 9, 'comment' => 'Some comment ...']);
    }
}
