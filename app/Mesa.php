<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    //devuelve el restaurante en el que se encuentra la mesa
    public function restaurante()
    {
        return $this->belongsTo('App\Restaurante', 'id_restaurante');
    }
    //devuelve todas las reservas que tiene una mesa
    public function reservas()
    {

        return $this->hasMany('App\Reserva', 'id_mesa');
    }
}
