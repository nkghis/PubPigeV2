<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coms', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->string('name');
            $table->float('lat',11, 7)->nullable();
            $table->float('lng',11,7)->nullable();
            $table->float('zoom', 5,2)->nullable();
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
        Schema::dropIfExists('coms');
    }
}
