<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plato extends Model
{
    protected $table = 'platos';
    public $timestamps = false;

    //devuelve los ingredientes de un plato
    public function ingredientes()
    {
        return $this->belongsToMany(Ingrediente::class, 'ingredientes_platos', 'id_plato', 'id_ingrediente');
    }
    //devuelve la categoria a la que pertenece un plato
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }
}
