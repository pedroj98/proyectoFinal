<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacturaCliente extends Model
{
    protected $table = 'facturas_clientes';
    public $timestamps = false;

    //devulve el cliente al que pertenece la factura
    public function cliente()
    {
        return $this->belongsTo('App\Cliente', 'id_cliente');
    }
    //devuelve el empleado que creo la factura -- en caso de que lo halla
    public function empleado()
    {
        return $this->belongsTo('App\Empleado', 'id_empleado');
    }
    //devuelve el restaurante en el que se emitio la factura
    public function restaurante()
    {
        return $this->belongsTo('App\Restaurante', 'id_restaurante');
    }
    //devuelve los platos que comforman una factura
    public function platos()
    {

        return $this->belongsToMany('App\Plato', 'platos_facturas', 'id_factura', 'id_plato')->withPivot('precio', 'cantidad');
    }


}
