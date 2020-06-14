<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurante;
use App\Empleado;
use App\Menu;
use DB;

class RestauranteController extends Controller
{
    /**
     * muestra una lista con la informacion de todos los restaurantes
     *
     * @return \Illuminate\Http\Response una vista con la informacion de todos los restaurantes
     */
    public function index()
    {

        $restaurantes = Restaurante::all();
        return view('administrador.restaurantes')->with(['restaurantes' => $restaurantes]);
    }

    /**
     * muestra un formulario para editar la informacion de un determinado restaurante
     *
     * @return \Illuminate\Http\Response devuelve la vista del formulario
     */
    public function create()
    {
        $gerentes = Empleado::where('id_role', 3)->whereNull('id_restaurante')->get();
        $menus = Menu::all();
        return view('administrador.crearRestaurante', compact('gerentes', 'menus'));
    }


    /**
     * almacena en la base de datos un nuevo restaurante
     *
     * @param  \Illuminate\Http\Request  $request datos del restaurante obtenidos del formulario
     * @return \Illuminate\Http\Response una vista con todos los restaurantes
     */
    public function store(Request $request)
    {

        $errores = array();

        if (Restaurante::where('nombre', '=', $request->nombre)->exists()) {

            $errores[] = 'ya existe un restaurante con ese nombre';
        }
        if (empty($errores)) {

            if (isset($request->imagen)) {

                $imagen = $request->imagen;
                $nombre = $imagen->getClientOriginalName();
                $imagen->move('images', $nombre);
            }

            $data = array(
                'nombre' => $request['nombre'], "direccion" => $request['direccion'],
                "telefono" => $request['telefono'], "hora_apertura" => $request['hora_apertura'],
                "hora_Cierre" => $request['hora_cierre'], "telefono" => $request['telefono'],
                "fecha_apertura" => $request['fecha_apertura'], "id_menu" => $request['menu'],
                "ciudad" => $request['ciudad'], 'imagen' => $nombre
            );
            DB::table('restaurantes')->insert($data);

            return redirect('administrador/restaurantes');
        } else {

            return redirect()->back()->withErrors($errores);
        }
    }


    /**
     * muestra un formulario para editar la informacion de un restaurante en concreto
     *
     * @param  int  $id identificador del restaurante
     * @return \Illuminate\Http\Response una vista con el formulario
     */
    public function edit($id)
    {
        $restaurante = Restaurante::find($id);
        $gerentes = Empleado::where('id_role', 3)->get();
        $menus = Menu::all();
        return view('administrador.editarRestaurante', compact('gerentes', 'menus', 'restaurante'));
    }

    /**
     * actualiza en la base de datos la informacion de un restaurante en concreto
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id identificador del restaurante
     * @return \Illuminate\Http\Response una vista con la informacion de todos los restaurantes
     */
    public function update(Request $request, $id)
    {

        $errores = array();

        if (Restaurante::where('nombre', '=', $request->nombre)->exists() && Restaurante::find($id)->nombre != $request->nombre) {

            $errores[] = 'ya existe un restaurante con ese nombre';
        }

        if (empty($errores)) {

            if (isset($request->imagen)) {

                $imagen = $request->imagen;
                $nombre = $imagen->getClientOriginalName();
                $imagen->move('images', $nombre);

                $restaurante = Restaurante::find($id);
                $restaurante->imagen = $nombre;
                $restaurante->save();
            }


            $data = array(
                'nombre' => $request['nombre'], "direccion" => $request['direccion'],
                "telefono" => $request['telefono'], "hora_apertura" => $request['hora_apertura'],
                "hora_Cierre" => $request['hora_cierre'], "telefono" => $request['telefono'],
                "fecha_apertura" => $request['fecha_apertura'], "id_menu" => $request->menu,
                "ciudad" => $request['ciudad']
            );

            Restaurante::whereId($id)->update($data);

            return redirect("/administrador/restaurantes");
        } else {

            return redirect()->back()->withErrors($errores);
        }
    }

    /**
     * elimina un restaurante de la base de datos
     *
     * @param  int  $id identificador del restaurante
     * @return \Illuminate\Http\Response una vista de todos los restaurantes
     */
    public function destroy($id)
    {
        Restaurante::find($id)->delete();

        return redirect("/administrador/restaurantes");
    }

    /**
     * muestra el inventario de un restaurante en concreto
     *
     * @param  int  $id identificador del restaurante
     * @return \Illuminate\Http\Response una vista con todos los ingredientes que almacena un restaurante
     */
    public function ingredientes($id)
    {
        $restaurante = Restaurante::find($id);

        return view('administrador.ingredientesRestaurantes')->with(['restaurante' => $restaurante]);
    }

    /**
     * Elimina un ingrediente del inventario de un restaurante.
     *
     * @param  int  $id identificador del restaurante
     * @return \Illuminate\Http\Response una vista con todos los ingredientes que almacena un restaurante
     */
    public function eliminarIngrediente($restaurante, $ingrediente)
    {
        DB::table('ingredientes_restaurantes')->where('id_restaurante', $restaurante)->where('id_ingrediente', $ingrediente)->delete();

        return redirect("/administrador/restaurantes/ingredientes/$restaurante");
    }
}
