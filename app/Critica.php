<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Critica extends Model
{

    public $timestamps = false;

    //devuelve el restaurante sobre el que se hizo la critica
    public function restaurante()
    {
        return $this->belongsTo('App\Restaurante', 'id_restaurante');
    }
    //devuelve el usuario que redacto la critica
    public function usuario()
    {
        return $this->belongsTo('App\Cliente', 'id_usuario');
    }
}
