<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            //informacion comun para todos los usuarios
            $table->bigIncrements('id');
            $table->string('usuario')->nullable();
            $table->string('password')->nullable();
            $table->string('email')->nullable();
            $table->string('direccion')->nullable();
            $table->date('fecha_incorporacion')->nullable();
            $table->string('telefono')->nullable();
            $table->string('imagen');
            $table->unsignedBigInteger('id_role');
            $table->foreign('id_role')->references('id')->on('roles')->onDelete('cascade')->onUpdate('cascade');

            //informacion requerida unicamente para el personal
            $table->string('nombre')->nullable();
            $table->string('apellidos')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('numero_seguridad_social')->nullable();
            $table->double('sueldo')->nullable();
            $table->unsignedBigInteger('id_restaurante')->nullable();
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
        Schema::dropIfExists('usuario');
    }
}
