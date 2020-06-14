<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurante extends Model
{
    public $timestamps = false;


    //devuelve el menu del restaurante
    public function menu()
    {
        return $this->belongsTo('App\Menu', 'id_menu');
    }
    //devuelve al gerente del restaurante
    public function gerente()
    {

        return $this->hasMany('App\Empleado', 'id_restaurante')
            ->where('id_role', 3);
    }
    //devuelve las mesas de un restaurante
    public function mesas()
    {
        return $this->hasMany('App\Mesa', 'id_restaurante');
    }
    //devuelve las criticas de un restaurante
    public function criticas()
    {
        return $this->hasMany('App\Critica', 'id_restaurante')->where('estado', 'aceptada');
    }
    //devuelve los ingredientes almacenados en un restaurante
    public function ingredientes()
    {

        return $this->belongsToMany('App\Ingrediente', 'ingredientes_restaurantes', 'id_restaurante', 'id_ingrediente')->withPivot('cantidad');
    }
}
