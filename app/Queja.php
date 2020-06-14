<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Queja extends Model
{
    //devuelve el restaurante al que se le hizo la queja
    public function restaurante()
    {
        return $this->belongsTo('App\Restaurante', 'id_restaurante');
    }
    //devuelve el usuario que creo la queja
    public function usuario()
    {
        return $this->belongsTo('App\Cliente', 'id_usuario');
    }
}
