<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userclients', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('client_id');
            /*$table->integer('user_id')->unsigned();
            $table->integer('client_id')->unsigned();*/


            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('client_id')->references('code')->on('clients')
               ->onDelete('cascade');
/*
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('client_id')->references('code')->on('roles')
                ->onDelete('cascade');*/
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
        Schema::dropIfExists('userclients');
    }
}
