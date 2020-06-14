<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\FacturaProveedor;

class FacturaProveedorController extends Controller
{
    /**
     * muestra una lista con todas las facturas hechas por los proveedores
     *
     * @return \Illuminate\Http\Response una vista con todas las facturas
     */
    public function index()
    {
        $facturas =  FacturaProveedor::all();
        return view('administrador.facturasProveedores')->with(['facturas' => $facturas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * muestra todos los ingredientes que se han adquirido en una factura en concreto
     *
     * @param  int  $id identificador de la factura
     * @return \Illuminate\Http\Response devuelve informacion sobre los ingredientes de dicha factura
     */
    public function ingredientes($id)
    {
        $factura =  FacturaProveedor::find($id);

        return view('administrador.ingredientesFacturas')->with(['factura' => $factura]);
    }


    /**
     * elimina una factura de un proveedor de la base de datos
     *
     * @param  int  $id identificador de la factura
     * @return \Illuminate\Http\Response una vista con todas las facturas de los proveedores
     */
    public function destroy($id)
    {
        FacturaProveedor::find($id)->delete();

        return redirect("/administrador/facturas/proveedores");
    }
}
