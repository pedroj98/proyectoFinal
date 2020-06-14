<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plato;
use App\Categoria;
use App\Ingrediente;
use DB;

class PlatoController extends Controller
{
    /**
     * muestra una lista de todos los platos
     *
     * @return \Illuminate\Http\Response una vista con la informacion de todos los platos
     */
    public function index()
    {
        $platos =  Plato::all();
        return view('administrador.platos')->with(['platos' => $platos]);
    }

    /**
     * muestra un formulario para crear un nuevo plato
     *
     * @return \Illuminate\Http\Response una vista con la informacion de todos los platos
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('administrador.crearPlato')->with(['categorias' => $categorias]);
    }

    /**
     * almacena un plato en la base de datos
     *
     * @param  \Illuminate\Http\Request  $request informacion del plato obtenida desde el formulario
     * @return \Illuminate\Http\Response una vista con la informacion de todos los platos
     */
    public function store(Request $request)
    {

        $errores = array();

        if (Plato::where('nombre', '=', $request->nombre)->exists()) {

            $errores[] = 'ya existe un plato con ese nombre';
        }


        if (empty($errores)) {

            //si no se le ha proporcionado una imagen al plato se le añade una por defecto
            if (isset($request->imagen)) {

                $imagen = $request->imagen;
                $nombre = $imagen->getClientOriginalName();
                $imagen->move('images', $nombre);
            } else {
                $nombre = 'plato.png';
            }
            $data = array(
                'nombre' => $request['nombre'], "descripcion" => $request['descripcion'],
                'imagen' => $nombre, 'id_categoria' => $request['categoria']
            );
            DB::table('platos')->insert($data);

            return redirect("/administrador/platos");
        } else {

            return redirect()->back()->withErrors($errores);
        }
    }


    /**
     * muestra un formulario para cambiar la informacion de un plato en concreto
     *
     * @param  int  $id identificador del plato
     * @return \Illuminate\Http\Response una vista con un formulario para modificar un plato
     */
    public function edit($id)
    {
        $plato = Plato::find($id);
        $categorias = Categoria::all();
        return view('administrador.editarPlato', compact('plato', 'categorias'));
    }

    /**
     * actualiza la informacion de un plato en la base de datos
     *
     * @param  \Illuminate\Http\Request  $request informacion obtenida del formulario
     * @param  int  $id identificador del plato
     * @return \Illuminate\Http\Response una vista con la informacion de todos los platos
     */
    public function update(Request $request, $id)
    {

        $errores = array();

        if (Plato::where('nombre', '=', $request->nombre)->exists() && Plato::find($id)->nombre != $request->nombre) {

            $errores[] = 'ya existe un plato con ese nombre';
        }
        if (empty($errores)) {

            //si no se le proporciona al plato una imagen se le da una por defecto
            if (isset($request->imagen)) {

                $imagen = $request->imagen;
                $nombre = $imagen->getClientOriginalName();
                $imagen->move('images', $nombre);

                $plato = Plato::find($id);
                $plato->imagen = $nombre;
                $plato->save();
            }

            $data = array(
                'nombre' => $request['nombre'], "descripcion" => $request['descripcion'],
                'id_categoria' => $request['categoria']
            );


            Plato::whereId($id)->update($data);

            return redirect("/administrador/platos");
        } else {
            return redirect()->back()->withErrors($errores);
        }
    }

    /**
     * elimina un plato de la base de datos
     *
     * @param  int  $id identificador del plato
     * @return \Illuminate\Http\Response una vista con la informacion de todos los platos
     */
    public function destroy($id)
    {
        Plato::find($id)->delete();

        return redirect("/administrador/platos");
    }

    /**
     * muestra todos los ingredientes que componen un plato
     *
     * @param  int  $id identificador del plato
     * @return \Illuminate\Http\Response una vista con la informacion de los ingrentes que componen un plato
     */
    public function ingredientes($id)
    {
        $plato = Plato::find($id);

        return view('administrador.ingredientesPlatos')->with(['plato' => $plato]);
    }

    /**
     * devuelve una vista para decidir que ingredientes forman parte de un plato
     *
     * @param  int  $id identificador del plato
     * @return \Illuminate\Http\Response una vista para seleccionar los ingredientes que componen un plato
     */
    public function editarIngredientes($id)
    {
        $plato = Plato::find($id);
        $ingredientes = Ingrediente::all();

        return view('administrador.editarIngredientesPlatos', compact('plato', 'ingredientes'));
    }

    /**
     * añade un ingrediente a un plato
     *
     * @param  \Illuminate\Http\Request
     */
    public function añadirIngrediente(Request $request)
    {
        $plato = $request->plato; //identificador del plato
        $ingrediente = $request->ingrediente; //identificador del ingredinete

        DB::table('ingredientes_platos')->insert([
            ['id_plato' => $plato, 'id_ingrediente' => $ingrediente]
        ]);
    }

    /**
     * quita un ingrediente de un plato
     *
     * @return \Illuminate\Http\Response
     */
    public function quitarIngrediente(Request $request)
    {
        $plato = $request->plato; //identificador del plato
        $ingrediente = $request->ingrediente; //identificador del ingredinete

        DB::table('ingredientes_platos')->where('id_ingrediente', $ingrediente)->where('id_plato', $plato)->delete();
    }
}
