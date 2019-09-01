<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Campground;
use App\Comment;
use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'body' => $faker->sentence,
        'campground_id' => factory(Campground::class)
    ];
});
