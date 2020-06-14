<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_factura');
            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('id_restaurante');
            $table->dateTime('fecha');
            $table->foreign('id_factura')->references('id')->on('facturas_clientes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_cliente')->references('id')->on('usuarios')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('pedidos');
    }
}
