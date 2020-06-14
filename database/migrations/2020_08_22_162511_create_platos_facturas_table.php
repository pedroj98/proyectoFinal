<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlatosFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('platos_facturas', function (Blueprint $table) {
            $table->unsignedBigInteger('id_plato');
            $table->unsignedBigInteger('id_factura');
            $table->integer('cantidad');
            $table->double('precio');
            $table->foreign('id_plato')->references('id')->on('platos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_factura')->references('id')->on('facturas_clientes')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('platos_facturas');
    }
}
