<?php

use App\User;
use App\Groupe;
use App\Adresse;
use App\Fonction;
use App\Moniteur;
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

        $adresses = factory( Adresse::class, 50 )->create();

        $personnesAdultes = factory( Personne::class, 150 )->create()
            ->each(function ( $personne ) use ( $adresses ) 
            {
                $personne->adresse()->associate( $adresses->random() )->save();
            });

        $groupes = collect([
            Groupe::create([ 'nomCourt' => '1', 'nomLong' => 'Groupe 1' ]),
            Groupe::create([ 'nomCourt' => '2', 'nomLong' => 'Groupe 2' ]),
            Groupe::create([ 'nomCourt' => '3', 'nomLong' => 'Groupe 3' ]),
        ]);

        factory( Personne::class, 50 )->create() // créé 50 Personnes
            ->each( function ( $personne ) use ( $groupes, $personnesAdultes ) 
            {
                JeuneSapeur::create([
                    // créé un JeuneSapeur et lui assigne cette Personne
                    'personne_id' => $personne->id,
                    // assigne un Groupe aléatoire
                    'groupe_id' => $groupes->random()->id,
                // assigne 2 ResponsablesLégaux aléatoires
                ])->responsablesLegaux()->sync( $personnesAdultes->random(2) );
            });
        
        $fonctions = factory( Fonction::class, 10 )->create();

        factory( Moniteur::class, 50 )->make()->each(
            function ( Moniteur $moniteur ) use ( $personnesAdultes, $fonctions )
            {
                $moniteur->personne()->associate( $personnesAdultes->random() )->save();
                $moniteur->fonctions()->sync( $fonctions->random(2) );
            }
        );    
    }
}
