<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->date("date_reservation");

            // foreign keys
            $table->unsignedBigInteger('etudiant_id');
            $table->foreign('etudiant_id')->references('id')->on("etudiants");
            $table->unsignedBigInteger('copy_id');
            $table->foreign('copy_id')->references('id')->on("copies");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
