<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    //devuelve al cliente que hizo el pedido
    public function cliente()
    {
        return $this->belongsTo('App\Cliente', 'id_cliente');
    }
    //devuelve el restaurante al que se ha hecho el pedido
    public function restaurante()
    {
        return $this->belongsTo('App\Restaurante', 'id_restaurante');
    }
    //devuelve la factura del pedido
    public function factura()
    {
        return $this->belongsTo('App\FacturaCliente', 'id_factura');
    }
}
