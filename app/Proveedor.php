<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedores';
    public $timestamps = false;

    //devuelve los ingredientes que distribuye un proveedor
    public function ingredientes()
    {
        return $this->belongsToMany('App\Ingrediente', 'ingredientes_proveedores', 'id_proveedor', 'id_ingrediente')->withPivot('precio');
    }
}
