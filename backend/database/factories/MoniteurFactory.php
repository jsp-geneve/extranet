<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Moniteur;
use Faker\Generator as Faker;

$factory->define(Moniteur::class, function (Faker $faker) {
    return [
        "grade" => $faker->title,
        "incorporation" => $faker->word,
        "remarques" => $faker->optional()->paragraph(1),
    ];
});
