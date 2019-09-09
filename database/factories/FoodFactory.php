<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Food;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Food::class, function (Faker $faker) {
    $foods = ['Pizza', 'Pasta', 'Kebab'];
    $types = ['fast food', 'traditional', 'home made'];

    return [
        'name' => $foods[array_rand($foods)],
        'type' => $types[array_rand($types)],
    ];
});