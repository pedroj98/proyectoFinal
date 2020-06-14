<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredientesFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredientes_facturas', function (Blueprint $table) {
            $table->unsignedBigInteger('id_ingrediente');
            $table->unsignedBigInteger('id_factura');
            $table->integer('cantidad');
            $table->integer('precio');
            $table->foreign('id_ingrediente')->references('id')->on('ingredientes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_factura')->references('id')->on('facturas_proveedores')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredientes_facturas');
    }
}
