<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredientesRestaurantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredientes_restaurantes', function (Blueprint $table) {
            $table->unsignedBigInteger('id_restaurante');
            $table->unsignedBigInteger('id_ingrediente');
            $table->double('cantidad');
            $table->foreign('id_restaurante')->references('id')->on('restaurantes')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('ingredientes_restaurantes');
    }
}
