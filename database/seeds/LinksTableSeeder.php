<?php

use Illuminate\Database\Seeder;

class LinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('links')->delete();

        factory(App\Link::class, 3)->create(
            [
                'created_by' => 1,
                'linkable_id' => 1,
                'linkable_type' => 'song'
            ]
        );
    }
}
