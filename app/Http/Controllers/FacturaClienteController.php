<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FacturaCliente;
use App\Empleado;
use DB;

class FacturaClienteController extends Controller
{
    /**
     * muestra todas las facturas de los clientes
     *
     * @return \Illuminate\Http\Response 
     */
    public function index()
    {
        $facturas =  FacturaCliente::all();
        return view('administrador.facturasClientes')->with(['facturas' => $facturas]);
    }

    /**
     * Devuelve la vista de un terminal para que los camareros puedan cobrar a los clientes
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('camarero.terminal');
    }

    /**
     * almacena una nueva factura en la base de datos
     *
     * @param  \Illuminate\Http\Request  $request datos de la factura
     * 
     */
    public function store(Request $request)
    {
        //si es una factura creada por un camarero desde un terminal de cobro
        if (auth()->user()->role->nombre == 'camarero') {

            $data = array(
                'id_empleado' => auth()->user()->id, "fecha" => date('Y-m-d H:i'),
                "total" => $request->total,
                "id_restaurante" => $request->restaurante,
                'id_cliente' => 2
            );
            //si es una factura creada por un usuario al realizar un pedido
        } else {

            $data = array(
                "fecha" => date('Y-m-d H:i'),
                "total" => $request->total,
                'id_cliente' => auth()->user()->id,
                "id_restaurante" => $request->restaurante,
            );
        }


        DB::table('facturas_clientes')->insert($data);
    }



    /**
     * almacena en la base de datos los platos que componen una factura
     *
     * @param  \Illuminate\Http\Request  $request informacion del plato
     * 
     */
    public function guardarPlatos(Request $request)
    {

        $factura = DB::table('facturas_clientes')->orderBy('id', 'DESC')->first();

        $data = array(
            'id_factura' => $factura->id, "cantidad" => $request->cantidad,
            "precio" => $request->precio, 'id_plato' => $request->plato
        );
        DB::table('platos_facturas')->insert($data);
    }


    /**
     * muestra todos los platos que conforman una factura
     *
     * @param  int  $id identificador de la factura
     * @return \Illuminate\Http\Response una vista con todos los platos de una determinada factura
     */
    public function platos($id)
    {
        $factura =  FacturaCliente::find($id);

        return view('administrador.platosFacturas')->with(['factura' => $factura]);
    }


    /**
     * elimina una factura de la base de datos
     *
     * @param  int  $id identificador de la factura
     * @return \Illuminate\Http\Response una vista con todas las facturas de todos los clientes
     */
    public function destroy($id)
    {
        FacturaCliente::find($id)->delete();

        return redirect("/administrador/facturas/clientes");
    }
}
