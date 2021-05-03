<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoMeteoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_meteo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->$table->float('temperatura', 4, 2);
            $table->integer('umidità');
            $table->float('vento', 5, 2);
            $table->integer('nuvolosità');
            $table->integer('pressione_atmosferica');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('info_meteo');
    }
}
