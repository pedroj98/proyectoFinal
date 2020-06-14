<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredientesPlatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredientes_platos', function (Blueprint $table) {
            $table->unsignedBigInteger('id_plato');
            $table->unsignedBigInteger('id_ingrediente');
            $table->foreign('id_plato')->references('id')->on('platos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_ingrediente')->references('id')->on('ingredientes')->onDelete('cascade')->onUpdate('cascade');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredientes_platos');
    }
}
