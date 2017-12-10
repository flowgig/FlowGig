<?php

use Faker\Generator as Faker;

$factory->define(App\Song::class, function (Faker $faker) {

    $musicalKeys =
        [
            'C', 'D', 'E', 'F', 'G', 'A', 'H',
            'Cm', 'Dm', 'Em', 'Fm', 'Gm', 'Am', 'Hm',
            'C♯', 'D♯', 'E♯', 'F♯', 'G♯', 'A♯', 'H♯',
            'C♯m', 'D♯m', 'E♯m', 'F♯m', 'G♯m', 'A♯m', 'H♯m',
            'C♭', 'D♭', 'E♭', 'F♭', 'G♭', 'A♭', 'H♭',
            'C♭m', 'D♭m', 'E♭m', 'F♭m', 'G♭m', 'A♭m', 'H♭m'
        ];

    return [
        'created_by' => 1,
        'band_id' => 1,
        'title' => rtrim($faker->realText(20, 3), ".,:;'-"),
        'artist' => 'The ' . $faker->jobTitle . 's',
        'music_by' => $faker->name,
        'lyrics_by' => $faker->name,
        'key' => $faker->randomElement($musicalKeys),
        'bpm' => $faker->numberBetween(70, 130),
        'duration' => $faker->numberBetween(180, 240),
        'intensity' => $faker->numberBetween(1, 10),
    ];
});
