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

        SetlistSong::create(['setlist_id' => 1, 'song_id' => 1, 'number_in_list' => 1,
            'key' => 'C', 'bpm' => 60, 'duration' => 160, 'intensity' => 6, 'comment' => 'Some comment ...']);

        SetlistSong::create(['setlist_id' => 1, 'song_id' => 2, 'number_in_list' => 2,
            'key' => 'D', 'bpm' => 70, 'duration' => 170, 'intensity' => 7, 'comment' => 'Some comment ...']);
    }
}
