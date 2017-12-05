<?php

use Faker\Generator as Faker;

$factory->define(App\Gig::class, function (Faker $faker) {

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
