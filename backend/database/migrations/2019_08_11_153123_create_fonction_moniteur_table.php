<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFonctionMoniteurTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fonction_moniteur', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('fonction_id');
            $table->unsignedBigInteger('moniteur_id');
            $table->timestamps();

            $table->foreign('fonction_id')->references('id')->on('fonctions');
            $table->foreign('moniteur_id')->references('id')->on('moniteurs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fonction_moniteur');
    }
}
