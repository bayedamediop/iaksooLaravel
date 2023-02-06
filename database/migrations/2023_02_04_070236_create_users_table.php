<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('telephone');
            $table->string('avatar')->nullable();
            $table->string('email')->unique();
            //$table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('nomAgence')->nullable();;
            $table->string('adresse')->nullable();;
            $table->string('compteur')->nullable();;
            //$table->unsignedBigInteger('profil_id');
            //$table->foreign('profil_id')->references('id')->on('profils');
            $table->boolean('archivage') -> false;
            $table->foreignId('profil_id')->constrained();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
