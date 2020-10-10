<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Candidature extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('candidatures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_user");
            $table->foreign("id_user")->references("id")->on("users");
            $table->string('état_candidature')->default("envoyée");
            $table->string("poste")->nullable();
            $table->string('lien')->nullable();
            $table->string('entreprise')->nullable();
            $table->string('lieu')->nullable();
            $table->string('mail')->nullable();
            $table->string('téléphone')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
