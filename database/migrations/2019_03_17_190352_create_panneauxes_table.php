<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePanneauxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('panneauxes', function (Blueprint $table) {
            $table->bigIncrements('idPanneaux');
            $table->string('emplacement')->nullable();
            $table->integer('partdevoix')->nullable();
            $table->string('latittude')->nullable();
            $table->string('longitude')->nullable();
            $table->longText('image')->nullable();
            $table->integer('estconcurent')->nullable();
            $table->integer('estconfrere')->nullable();
            $table->string('marqueur')->nullable();
            $table->integer('idclient')->unsigned();
            $table->integer('idcampagne')->unsigned();
            $table->integer('idcommune')->unsigned();
            $table->integer('idregie')->unsigned();
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
        Schema::dropIfExists('panneauxes');
    }
}
