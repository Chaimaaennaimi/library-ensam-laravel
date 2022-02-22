<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id();
            $table->string("apogee");
            $table->string('cne')->unique();
            $table->string('cin')->unique();
            $table->string('nom');
            $table->string('prenom');
            $table->date("date_de_naissance");
            $table->string("adresse");
            $table->string("email_institutionnel");
            $table->string("email_personnel")->nullable();
            $table->enum("sexe", ["male", "female"]);

            //foreign key
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on("users");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etudiants');
    }
}
