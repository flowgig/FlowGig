<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'verified' => true,
    ];
});

$factory->define(App\Song::class, function (Faker\Generator $faker) {

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

$factory->define(App\Gig::class, function (Faker\Generator $faker) {

    $gigNames = [
        'Summer Music Fest',
        'Funky Nights',
        'Jam session',
        'Lunch Gig',
        'Student event',
        'Opening',
        'Spring Festival',
        'Wedding party',
        'Charity concert',
        'Comeback tour, first gig'
    ];

    $streetNameVenueSuffix = [
        'Concert House',
        'Blues Club',
        'Opera',
        'Stage',
        'Rock Garage',
        'Music Hall',
        'Park',
        'Jazz Temple',
        'Metal Dungeon',
        'Stadium'
    ];

    return [
        'created_by' => 1,
        'band_id' => 1,
        'name' => $faker->randomElement($gigNames),
        'date' => $faker->dateTime,
        'venue' => $faker->streetName . ' ' . $faker->randomElement($streetNameVenueSuffix),
        'location' => $faker->city,
        'confirmed' => $faker->randomElement([true,false]),
        'public' => $faker->randomElement([true,false]),
    ];
});
