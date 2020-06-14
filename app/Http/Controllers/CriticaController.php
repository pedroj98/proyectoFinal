<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Critica;
use DB;

class CriticaController extends Controller
{
    /**
     * devuelve una lista de todas las criticas de la base de datos
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $criticas =  Critica::all();
        return view('administrador.criticas')->with(['criticas' => $criticas]);
    }

    /**
     * devuelve un formulario para que el cliente pueda dejar una critica
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('usuario.crearCritica')->with(['id_restaurante' => $id]);
    }


    /**
     * almacena una critica en la base de datos
     *
     * @param  \Illuminate\Http\Request  $request informacion recibida del formulario
     * @return \Illuminate\Http\Response la vista de un restaurante en concreto
     */
    public function store(Request $request)
    {
        $data = array(
            'titulo' => $request['titulo'], "id_restaurante" => $request['restaurante'],
            'fecha' => date('Y-m-d'), "id_usuario" => auth()->user()->id,
            "puntuacion" => $request['puntuacion'], "descripcion" => $request['descripcion'],
            "estado" => 'pendiente'
        );
        DB::table('criticas')->insert($data);

        $restaurante = $request['restaurante'];

        return redirect("/restaurantes/$restaurante");
    }

 

    /**
     * elimina una critica de la base de datos
     *
     * @param  int  $id identificador de la critica
     * @return \Illuminate\Http\Response vista con todas las criticas
     */
    public function destroy($id)
    {
        Critica::find($id)->delete();

        return redirect("/administrador/criticas");
    }

    /**
     * devuelve el contenido de una critica para que el administrador decida si su contenido es aceptable o no
     *
     * @param  int  $id identificador de la critica
     * @return \Illuminate\Http\Response devuelve una vista con el contenido de la critica
     */
    public function evaluarCritica($id)
    {
        $critica = Critica::find($id);

        return view('administrador.evaluarCritica')->with(['critica' => $critica]);
    }

    /**
     * hace publica una critica aprobada por el administrador
     *
     * @param  int  $id identificador de la critica
     * @return \Illuminate\Http\Response una vista con todas las criticas
     */
    public function aprobarCritica($id)
    {
        Critica::where('id', $id)
            ->update(['estado' => 'aprobada']);

        return redirect("/administrador/criticas");
    }
}
