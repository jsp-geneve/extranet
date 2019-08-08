<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Personne;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Personne::class, function (Faker $faker) {
    return [
        'prenom' => $faker->firstName,
        'nom' => $faker->lastName,
        'telephone' => $faker->phoneNumber,
        'email' => $faker->email,
        'naissance' => $faker->date(),
        'documentIdentite' => Str::random(10),
        'anneeEntree' => $faker->year,
        'photo' => $faker->url(),
        'groupeSanguin' => $faker->randomLetter,
        'assuranceMaladie' => $faker->company,
        'assuranceAccident' => $faker->company,
        'allergies' => $faker->words(3, true),
        'regimeAlimentaire' => $faker->words(2, true),
        'medicaments' => $faker->words(3, true),
        'publicationPhotosAutorisee' => $faker->boolean,
    ];
});
