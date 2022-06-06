<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Campground;
use Faker\Generator as Faker;

$factory->define(Campground::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(4),
        'picture' => $faker->image,
        'description' => $faker->sentence(4),
        'price' => $faker->randomDigit(),
        'owner_id' => factory(App\User::class)
    ];
});
