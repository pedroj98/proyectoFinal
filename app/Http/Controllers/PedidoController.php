<?php

namespace App\Http\Controllers;

use Illuminate\Support\facades\Mail;
use Illuminate\Http\Request;
use App\Pedido;
use App\Restaurante;
use DB;

class PedidoController extends Controller
{
    /**
     * muestra una informacion de todos los pedidos
     *
     * @return \Illuminate\Http\Response devuelve una vista con todos los pedidos de la base de datos
     */
    public function index()
    {
        $pedidos =  Pedido::all();
        return view('administrador.pedidos')->with(['pedidos' => $pedidos]);
    }

    /**
     * muestra una vista para que los ususarios registrados puedan hacer un pedido
     *
     * @return \Illuminate\Http\Response 
     */
    public function create($id)
    {
        $restaurante = Restaurante::find($id);
        return view('usuario.crearPedido')->with(['restaurante' => $restaurante]);
    }

    /**
     * almacena un pedido creado por el usuario en la base de datos y se le notifica que esta en camino
     *
     * @param  \Illuminate\Http\Request  $request datos obtenidos de la vista
     * 
     */
    public function store(Request $request)
    {
        $factura = DB::table('facturas_clientes')->orderBy('id', 'DESC')->first();

        $data = array(
            "fecha" => date('Y-m-d H:i'),
            'id_cliente' => auth()->user()->id,
            'id_factura' => $factura->id,
            'id_restaurante' => $request->restaurante
        );

        DB::table('pedidos')->insert($data);

        $datos = [
            'titulo' => 'Aviso de Pedido',
            'contenido' => "Su pedido ha sido recibido y esta siendo preparado por nuestros cocineros por lo que de aqui a una hora uno de 
            nuestros repartidores realizara la entrega en su domicilio, asegurese de que halla alguien en casa para recibir su pedido. Un cordial saludo, La Gula del Sur",


        ];

        Mail::send('emails.correo', $datos, function ($mensaje) {


            $mensaje->subject('Aviso de Pedido');
            $mensaje->to(auth()->user()->email);
        });
    }




    /**
     * elimina un pedido de la base de datos
     *
     * @param  int  $id identificador del pedido
     * @return \Illuminate\Http\Response devuelve una vista con informacion de todos los pedidos
     */
    public function destroy($id)
    {
        Pedido::find($id)->delete();

        return redirect("/administrador/pedidos");
    }
}
