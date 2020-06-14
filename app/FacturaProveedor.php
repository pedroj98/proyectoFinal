<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacturaProveedor extends Model
{
    protected $table = 'facturas_proveedores';
    public $timestamps = false;
    protected $dates = ['fecha'];

    //devuelve el proveedor que cobro la factura
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'id_proveedor');
    }
    //devuelve al empleado que realizo la compra
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'id_empleado');
    }
    //devuelve los ingredientes que incluye la factura
    public function ingredientes()
    {
        return $this->belongsToMany(Ingrediente::class, 'ingredientes_facturas', 'id_factura', 'id_ingrediente')->withPivot('cantidad','precio');
    }
}
