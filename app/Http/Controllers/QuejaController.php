<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Queja;
use DB;

class QuejaController extends Controller
{
    /**
     * muestra una lista de todas las quejas de todos los restaurantes
     *
     * @return \Illuminate\Http\Response una vista con la informacion de las quejas
     */
    public function index()
    {
        $quejas =  Queja::all();
        return view('administrador.quejas')->with(['quejas' => $quejas]);
    }

    /**
     * muestra un formulario para que un usuario registrado pueda crear una queja
     * 
      * @param  int  $id identificador del restaurante al que corresponde la critica
     * @return \Illuminate\Http\Response una vista con un formulario para crear la queja
     */
    public function create($id)
    {
        return view('usuario.crearQueja')->with(['id_restaurante' => $id]);
    }

    /**
     * almacena una nueva queja en la base de datos 
     *
     * @param  \Illuminate\Http\Request  $request informacion obtenida del formulario
     * @return \Illuminate\Http\Response la pagina del restaurante en la que se encontraba el usuario
     */
    public function store(Request $request)
    {
        $data = array(
            'titulo' => $request['titulo'], "id_restaurante" => $request['restaurante'],
            'fecha' => date('Y-m-d'), "id_usuario" => auth()->user()->id,
            "puntuacion" => $request['puntuacion'], "descripcion" => $request['descripcion']
        );
        DB::table('quejas')->insert($data);

        $restaurante = $request['restaurante'];

        return redirect("/restaurantes/$restaurante");
    }

    
    /**
     * elimina una queja de la base de datos
     *
     * @param  int  $id identificador de la queja
     * @return \Illuminate\Http\Response una vista con todas las quejas de todos los restaurantes
     */
    public function destroy($id)
    {
        Queja::find($id)->delete();

        return redirect("/administrador/quejas");
    }

    /**
     * muestra la informacion de una queja 
     *
     * @param  int  $id identificador de la queja
     * @return \Illuminate\Http\Response una vista con la informacion de la queja indicada
     */
    public function evaluarQueja($id)
    {
        $queja = Queja::find($id);

        return view('administrador.evaluarQueja')->with(['queja' => $queja]);
    }
}
