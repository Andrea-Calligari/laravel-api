<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('project_technology', function (Blueprint $table) {
           $table->unsignedBigInteger('project_id');
           $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade'); // cascade va a eliminare il progetto e a cascata tutte le tecnologie assegnate a quel progetto 

           $table->unsignedBigInteger('technology_id');
           $table->foreign('technology_id')->references('id')->on('technologies')->onDelete('cascade');

           // le due colonne vanno a costituire insime la chiave primaria //array 
           $table->primary(['project_id','technology_id']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_technology');
    }
};
