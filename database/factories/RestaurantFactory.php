<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Restaurant;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Restaurant::class, function (Faker $faker) {
    $name = collect(['Viona', 'Barouj', 'Buono'])
        ->random(1)
        ->values();

    return [
        'name' => $name,
        'description' => $faker->realText(50),
    ];
});