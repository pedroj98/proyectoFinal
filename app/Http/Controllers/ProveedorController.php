<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor;
use DB;

class ProveedorController extends Controller
{
    /**
     * muestra una lista con todos los proveedores de la base de datos
     *
     * @return \Illuminate\Http\Response una vista con la informacion de todos los proveedores
     */
    public function index()
    {
        $proveedores =  Proveedor::all();
        return view('administrador.proveedores')->with(['proveedores' => $proveedores]);
    }

    /**
     * muestra un formulario para crear un nuevo proveedor
     *
     * @return \Illuminate\Http\Response una vista con el formulario
     */
    public function create()
    {
        return view('administrador.crearProveedor');
    }

    /**
     * almacena un nuevo proveedor en la base de datos
     *
     * @param  \Illuminate\Http\Request  $request informacion obtenida del formulario
     * @return \Illuminate\Http\Response una vista con la informacion de todos los proveedores
     */
    public function store(Request $request)
    {

        $errores = array();

        if (Proveedor::where('nombre', '=', $request->nombre)->exists()) {

            $errores[] = 'ya existe un proveedor con ese nombre';
        }

        if (empty($errores)) {
            $data = array(
                'nombre' => $request['nombre'], "pais" => $request['pais'],
                "direccion" => $request['direccion'], "telefono" => $request['telefono'],
                'email' => $request['email']
            );
            DB::table('proveedores')->insert($data);

            return redirect("/administrador/proveedores");
        } else {
            return redirect()->back()->withErrors($errores);
        }
    }

    /**
     * muestra un formulario para editar la informacion de un proveedor en concreto
     *
     * @param  int  $id identificador del proveedor
     * @return \Illuminate\Http\Response una vista con el formulario
     */
    public function edit($id)
    {
        $proveedor = Proveedor::find($id);
        return view('administrador.editarProveedor')->with(['proveedor' => $proveedor]);
    }

    /**
     * actualiza la informacion del proveedor en la base de datos
     *
     * @param  \Illuminate\Http\Request  $request informacion del formulario
     * @param  int  $id identificador del proveedor
     * @return \Illuminate\Http\Response una vista con la informacion de todos los proveedores
     */
    public function update(Request $request, $id)
    {

        $errores = array();

        if (Proveedor::where('nombre', '=', $request->nombre)->exists() && Proveedor::find($id)->nombre != $request->nombre) {

            $errores[] = 'ya existe un proveedor con ese nombre';
        }

        if (empty($errores)) {

            $data = array(
                'nombre' => $request['nombre'], "pais" => $request['pais'],
                "direccion" => $request['direccion'], "telefono" => $request['telefono'],
                'email' => $request['email']
            );


            Proveedor::whereId($id)->update($data);

            return redirect("/administrador/proveedores");
        } else {

            return redirect()->back()->withErrors($errores);
        }
    }

    /**
     * elimina un determinado proveedor de la base de datos
     *
     * @param  int  $id identificador del proveedor
     * @return \Illuminate\Http\Response una vista con la informacion de todos los proveedores
     */
    public function destroy($id)
    {
        Proveedor::find($id)->delete();

        return redirect("/administrador/proveedores");
    }

    /**
     * muestra todos los ingredientes que distribuye un determinado proveedor
     *
     * @param  int  $id identificador del proveedor
     * @return \Illuminate\Http\Response una vista con los ingredientes que distribuye un proveedor en concretp
     */
    public function ingredientes($id)
    {
        $proveedor =  Proveedor::find($id);

        return view('administrador.ingredientesProveedores')->with(['proveedor' => $proveedor]);
    }

    /**
     * Elimina de la base de datos un ingrediente de un determinado proveedor
     *
     * @param  int  $proveedor identificador del proveedor
     * @param  int  $ingrediente identificador del ingrediente
     * @return \Illuminate\Http\Response una vista con todos los ingredientes del proveedor indicado
     */
    public function eliminarIngrediente($proveedor, $ingrediente)
    {
        DB::table('ingredientes_proveedores')->where('id_proveedor', $proveedor)->where('id_ingrediente', $ingrediente)->delete();

        return redirect("/administrador/proveedores/ingredientes/$proveedor");
    }
}
