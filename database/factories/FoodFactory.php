<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Food;
use Faker\Generator as Faker;

$factory->define(Food::class, function (Faker $faker) {
    $food = collect(['Pizza', 'Pasta', 'Kebab'])->random(1)->values()[0];
    $type = collect(['fast food', 'traditional', 'home made'])->random(1)->values()[0];

    return [
        'name' => $food,
        'type' => $type,
    ];
});