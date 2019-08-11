<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoniteursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moniteurs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('personne_id');
            $table->string('grade')->nullable();
            $table->string('incorporation')->nullable();
            $table->string('remarques')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('personne_id')->references('id')->on('personnes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('moniteurs');
    }
}
