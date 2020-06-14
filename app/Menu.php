<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Menu extends Model
{

    public $timestamps = false;

    //devuelve los restaurantes que sirven este menu
    public function restaurantes()
    {
        return $this->hasMany('App\Restaurante');
    }
    //devuelve los platos de este menu
    public function platos()
    {
        return $this->belongsToMany(Plato::class, 'menu_platos', 'id_menu', 'id_plato')->withPivot('precio');
    }
    //devuelve los platos de este menu que son desayunos
    public function desayunos()
    {
        return $this->belongsToMany(Plato::class, 'menu_platos', 'id_menu', 'id_plato')->where('id_categoria', '=', 1)->withPivot('precio');
    }
    //devuelve los platos de este menu que son entrantes
    public function entrantes()
    {
        return $this->belongsToMany(Plato::class, 'menu_platos', 'id_menu', 'id_plato')->where('id_categoria', '=', 2)->withPivot('precio');
    }
    //devuelve los platos de este menu que son platosPrincipales
    public function platosPrincipales()
    {
        return $this->belongsToMany(Plato::class, 'menu_platos', 'id_menu', 'id_plato')->where('id_categoria', '=', 3)->withPivot('precio');
    }
    //devuelve los platos de este menu que son sopas
    public function sopas()
    {
        return $this->belongsToMany(Plato::class, 'menu_platos', 'id_menu', 'id_plato')->where('id_categoria', '=', 4)->withPivot('precio');
    }
    //devuelve los platos de este menu que son postres
    public function postres()
    {
        return $this->belongsToMany(Plato::class, 'menu_platos', 'id_menu', 'id_plato')->where('id_categoria', '=', 5)->withPivot('precio');
    }
}
