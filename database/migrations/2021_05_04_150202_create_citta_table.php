<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCittaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citta', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->bigIncrements('id');
            $table->string('nome',30);
            $table->string('stato',30);
            $table->bigInteger('info_generali');
            $table->bigInteger('info_meteo');
            $table->foreign('info_generali')->references('id')->on('info_generali');
            $table->foreign('info_meteo')->references('id')->on('info_meteo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citta');
    }
}
