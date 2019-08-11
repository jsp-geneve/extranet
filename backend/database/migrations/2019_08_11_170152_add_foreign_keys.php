<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personnes', function (Blueprint $table) {
            $table->foreign('adresse_id')->references('id')->on('adresses');
        });

        Schema::table('jeunes_sapeurs', function (Blueprint $table) {
            $table->foreign('personne_id')->references('id')->on('personnes');
            $table->foreign('groupe_id')->references('id')->on('groupes');
        });

        Schema::table('responsables_legaux', function (Blueprint $table) {
            $table->foreign('personne_id')->references('id')->on('personnes');
            $table->foreign('jeune_sapeur_id')->references('id')->on('jeunes_sapeurs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('personnes', function (Blueprint $table) {
            $table->dropForeign(['adresse_id']);
        });
     
        Schema::table('jeunes_sapeurs', function (Blueprint $table) {
            $table->dropForeign(['personne_id']);
            $table->dropForeign(['groupe_id']);
        });
     
        Schema::table('responsables_legaux', function (Blueprint $table) {
            $table->dropForeign(['personne_id']);
            $table->dropForeign(['jeune_sapeur_id']);
        });
    }
}
