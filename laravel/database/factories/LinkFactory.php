<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Link;
use Faker\Generator as Faker;

$factory->define(Link::class, function (Faker $faker) {
    return [
        'full_link' => $faker->url(),
        'short_link' => $faker->url(),
    ];
});
