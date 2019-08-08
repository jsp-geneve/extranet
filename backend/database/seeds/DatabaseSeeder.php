<?php

use App\User;
use App\Groupe;
use App\Adresse;
use App\Personne;
use App\JeuneSapeur;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = factory( User::class, 10 )->create();

        $adresses = factory( Adresse::class, 10 )->create();

        $personnes = factory( Personne::class, 20 )->create()
            ->each(function ( $personne ) use ( $adresses ) 
            {
                $personne->adresse()->associate( $adresses->random() )->save();
            });

        $groupes = collect([
            Groupe::create([ 'nomCourt' => '1', 'nomLong' => 'Groupe 1' ]),
            Groupe::create([ 'nomCourt' => '2', 'nomLong' => 'Groupe 2' ]),
            Groupe::create([ 'nomCourt' => '3', 'nomLong' => 'Groupe 3' ]),
        ]);

        factory( Personne::class, 20 )->create()
            ->each( function ( $personne ) use ( $groupes, $personnes ) 
            {
                JeuneSapeur::create([
                    'groupe_id' => $groupes->random()->id,
                    'personne_id' => $personne->id,
                ])->responsablesLegaux()->sync( $personnes->random(2) );
            });
    }
}
