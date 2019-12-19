<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Visuel;
use Faker\Generator as Faker;

$factory->define(Visuel::class, function (Faker $faker) {
    return [
        'emplacement' => $faker->address,
        'partdevoix' => $faker->randomDigit,
        'latittude' => $faker->latitude($min = 4, $max = 10),
        'longitude' => $faker->longitude($min = -3, $max = -10),
        'image' => $faker->text($maxNbChars = 500) ,
        'idclient' => rand(9,10),
        'idcampagne' => rand(1,2),
        'idcommune' => rand(1,14),
        'idregie' =>rand(1,33),
    ];
});
