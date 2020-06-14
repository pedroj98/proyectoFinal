<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model

{
    //devuelve al cliente que creo la reserva
    public function cliente()
    {
        return $this->belongsTo('App\Cliente', 'id_cliente');
    }

    //devuelve la mesa reservada
    public function mesa()
    {
        return $this->belongsTo('App\Mesa', 'id_mesa');
    }
}
