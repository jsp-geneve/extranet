<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonnesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('prenom');
            $table->string('nom');
            $table->string('email')->nullable();
            $table->string('telephone')->nullable();
            $table->string('documentIdentite')->nullable();
            $table->string('anneeEntree')->nullable();
            $table->string('photo')->nullable();
            $table->date('naissance')->nullable();
            $table->string('groupeSanguin')->nullable();
            $table->string('assuranceMaladie')->nullable();
            $table->string('assuranceAccident')->nullable();
            $table->string('allergies')->nullable();
            $table->string('regimeAlimentaire')->nullable();
            $table->string('medicaments')->nullable();
            $table->boolean('publicationPhotosAutorisee')->nullable();
            $table->unsignedBigInteger('adresse_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personnes');
    }
}
