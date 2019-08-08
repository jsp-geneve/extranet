<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Adresse;
use Faker\Generator as Faker;

$factory->define(Adresse::class, function (Faker $faker) {
    return [
        'rue' => $faker->streetAddress,
        'localite' => $faker->city,
        'npa' => $faker->postcode,
        'pays' => $faker->country,
    ];
});
