<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturasClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas_clientes', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_cliente');
            $table->dateTime('fecha');
            $table->unsignedBigInteger('id_empleado')->nullable();
            $table->unsignedBigInteger('id_restaurante');
            $table->double('total');
            $table->foreign('id_cliente')->references('id')->on('usuarios')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_empleado')->references('id')->on('usuarios')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_restaurante')->references('id')->on('restaurantes')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facturas_clientes');
    }
}
