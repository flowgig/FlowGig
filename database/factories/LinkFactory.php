<?php

use Faker\Generator as Faker;

$factory->define(App\Link::class, function (Faker $faker) {

    return [
        'url' => $faker->url,
        'text' => $faker->domainWord,
    ];
});
