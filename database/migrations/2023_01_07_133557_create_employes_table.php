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
        Schema::create('employes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pays_id')->constrained()->cascadeOnDelete();
            $table->foreignId('ville_id')->constrained()->cascadeOnDelete();
            $table->foreignId('departement_id')->constrained()->cascadeOnDelete();
            $table->string('Nom');
            $table->string('Prenom');
            $table->string('adresse');
            $table->char('zip_code');
            $table->date('date_naissance');
            $table->date('date_emboche');
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
        Schema::dropIfExists('employes');
    }
};
