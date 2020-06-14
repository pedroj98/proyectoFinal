<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ingrediente;
use DB;

class IngredienteController extends Controller
{
    /**
     * muestra una lista de todos los ingredientes
     *
     * @return \Illuminate\Http\Response devuelve una vista con todos los ingredientes
     */
    public function index()
    {
        $ingredientes =  Ingrediente::all();
        return view('administrador.ingredientes')->with(['ingredientes' => $ingredientes]);
    }

    /**
     * muestra un formulario para dar de alta un ingrediente
     *
     * @return \Illuminate\Http\Response 
     */
    public function create()
    {
        return view('administrador.crearIngrediente');
    }

    /**
     * almacena un nuevo ingrediente
     *
     * @param  \Illuminate\Http\Request  $request informacion obtenida del formulario
     * @return \Illuminate\Http\Response una vista con todos los ingredientes
     */
    public function store(Request $request)
    {
        $errores = array();

        if (Ingrediente::where('codigo', '=', $request->codigo)->exists()) {

            $errores[] = 'ya existe un ingrediente con ese codigo';
        }

        if (empty($errores)) {

            $data = array(
                'nombre' => $request['nombre'], "codigo" => $request['codigo'],
            );
            DB::table('ingredientes')->insert($data);

            return redirect("/administrador/ingredientes");
        } else {

            return redirect()->back()->withErrors($errores);
        }
    }


    /**
     * muestra un formulario para cambiar la informacion de un ingrediente
     *
     * @param  int  $id identificador del ingrediente
     * @return \Illuminate\Http\Response 
     */
    public function edit($id)
    {
        $ingrediente =  Ingrediente::find($id);
        return view('administrador.editarIngrediente')->with(['ingrediente' => $ingrediente]);
    }

    /**
     * actualiza la informacion sobre un ingrediente
     *
     * @param  \Illuminate\Http\Request  $request informacion recibida del formulario
     * @param  int  $id identificador del ingrediente
     * @return \Illuminate\Http\Response vista con todos los ingredientes
     */
    public function update(Request $request, $id)
    {
        $errores = array();

        if (Ingrediente::where('codigo', '=', $request->codigo)->exists() && Ingrediente::find($id)->codigo != $request->codigo) {

            $errores[] = 'ya existe un ingrediente con ese codigo';
        }

        if (empty($errores)) {

            $data = array(
                'nombre' => $request['nombre'], "codigo" => $request['codigo']
            );

            Ingrediente::find($id)->update($data);

            return redirect("/administrador/ingredientes");
        } else {

            return redirect()->back()->withErrors($errores);
        }
    }

    /**
     * elimina un ingredietne en especifico
     *
     * @param  int  $id identificador del ingrediente
     * @return \Illuminate\Http\Response una vista con todos los ingredientes
     */
    public function destroy($id)
    {
        Ingrediente::find($id)->delete();

        return redirect("/administrador/ingredientes");
    }
}
