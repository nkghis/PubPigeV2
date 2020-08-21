<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampagnesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campagnes', function (Blueprint $table) {
            $table->bigIncrements('code');
            $table->string('libelle')->nullable();
            $table->date('DP_Campagne')->nullable();
            $table->date('FP_Campagne')->nullable();
            $table->string('Code_Pays')->nullable();
            $table->integer('Etat_Campagne')->nullable();
            $table->integer('Duree_Camp')->nullable();
            $table->integer('Code_Client')->unsigned();
            $table->integer('Code_Produit')->unsigned();
            $table->integer('Code_Marque')->unsigned();
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
        Schema::dropIfExists('campagnes');
    }
}
