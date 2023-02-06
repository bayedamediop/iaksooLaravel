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
        Schema::create('publications', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('titre');
            $table->string('description');
            $table->string('lieu');
            $table->integer('prix');
            $table->binary('imageCouvertire');
            $table->string('type');
            $table->string('sexe');
            $table->boolean('reserve');
            $table->boolean('archivage');
            $table->foreignId('user_id')->constrained();
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
        Schema::dropIfExists('publications');
    }
};
