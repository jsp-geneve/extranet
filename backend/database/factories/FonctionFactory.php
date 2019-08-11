<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Fonction;
use Faker\Generator as Faker;

$factory->define(Fonction::class, function (Faker $faker) {
    return [
        "titre" => $faker->jobTitle,
        "description" => $faker->optional()->sentence(3),
    ];
});
