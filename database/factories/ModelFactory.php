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
    ];
});

$factory->define(App\Song::class, function (Faker\Generator $faker) {
    return [
        'band_id' => 1,
        'title' => rtrim($faker->realText(20, 3), ".,:;'-"),
        'artist' => 'The ' . $faker->jobTitle . 's',
        'music_by' => $faker->name,
        'lyrics_by' => $faker->name
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
        'band_id' => 1,
        'name' => $faker->randomElement($gigNames),
        'date' => $faker->dateTime,
        'venue' => $faker->streetName . ' ' . $faker->randomElement($streetNameVenueSuffix),
        'location' => $faker->city,
        'confirmed' => $faker->boolean
    ];
});
