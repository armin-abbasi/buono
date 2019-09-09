<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Restaurant;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Restaurant::class, function (Faker $faker) {
    $names = ['Viona', 'Barouj', 'Buono'];

    return [
        'name' => $names[array_rand($names)],
        'description' => $faker->realText(50),
    ];
});