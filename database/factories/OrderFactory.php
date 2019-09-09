<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Order;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    $state = ['INIT', 'SUBMITTED', 'DELIVERED'];
    $resId = [1, 2, 3, 4, 5];

    return [
        'title' => $faker->realText(50),
        'state' => $state[array_rand($state)],
        'res_id' => $resId[array_rand($resId)],
    ];
});