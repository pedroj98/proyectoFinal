<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Plato;
use DB;

class MenuController extends Controller
{
    /**
     * muestra una lista con todos los menus
     *
     * @return \Illuminate\Http\Response vista con todos los menus
     */
    public function index()
    {
        $menus =  Menu::all();
        return view('administrador.menus')->with(['menus' => $menus]);
    }

    /**
     * muestra un formulario para crear un nuevo menu
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrador.crearMenu');
    }

    /**
     * almacena en la base de datos un nuevo menu
     *
     * @param  \Illuminate\Http\Request  $request datos del nuevo menu
     * @return \Illuminate\Http\Response una vista con todos los menus
     */
    public function store(Request $request)
    {

        $errores = array();

        if (Menu::where('nombre', '=', $request->nombre)->exists()) {

            $errores[] = 'ya existe un menu con ese nombre';
        }

        if (empty($errores)) {

            DB::table('menus')->insert(['nombre' => $request->nombre]);

            return redirect('administrador/menus');
        } else {
            return redirect()->back()->withErrors($errores);
        }
    }


    /**
     * muestra un formulario para cambiar la informacion de un menu en concreto
     *
     * @param  int  $id identificador del menu
     * @return \Illuminate\Http\Response formulario para cambiar la informacion del menu
     */
    public function edit($id)
    {
        $menu = Menu::find($id);
        return view('administrador.editarMenu')->with(['menu' => $menu]);
    }

    /**
     * Actualiza la informacion de un menu en concreto
     *
     * @param  \Illuminate\Http\Request  $request informacion del menu
     * @param  int  $id identificador del menu
     * @return \Illuminate\Http\Response una vista con todos los menus
     */
    public function update(Request $request, $id)
    {
        $errores = array();

        if (Menu::where('nombre', '=', $request->nombre)->exists()) {

            $errores[] = 'ya existe un menu con ese nombre';
        }

        if (empty($errores)) {

            $data = array('nombre' => $request->nombre);
            Menu::whereId($id)->update($data);

            return redirect("/administrador/menus");
        } else {

            return redirect()->back()->withErrors($errores);
        }
    }

    /**
     * elimina de la base de datos un determinado menu
     *
     * @param  int  $id identificador del menu
     * @return \Illuminate\Http\Response una vista con todos los menus restantes
     */
    public function destroy($id)
    {
        Menu::find($id)->delete();

        return redirect("/administrador/menus");
    }

    /**
     * muestra todo los platos que componen un menu
     *
     * @param  int  $id identificador del menu
     * @return \Illuminate\Http\Response una vista con todos los platos de un determinado menu
     */
    public function platos($id)
    {
        $menu = Menu::find($id);

        return view('administrador.platosMenus')->with(['menu' => $menu]);
    }

    /**
     * devuelve una vista para decidir que platos conforman un menu
     *
     * @param  int  $id identificador del menu
     * @return \Illuminate\Http\Response una vista para decidir que platos conforman un menu
     */
    public function editarCarta($id)
    {
        $menu = Menu::find($id);
        $platos = Plato::all();

        return view('administrador.editarPlatosMenus', compact('platos', 'menu'));
    }

    /**
     * añade un plato a un menu
     *
     * @param  \Illuminate\Http\Request recibe el identificador del plato y del menu
     * 
     */
    public function añadirPlato(Request $request)
    {
        $plato = $request->plato;
        $menu = $request->menu;

        DB::table('menu_platos')->insert([
            ['id_plato' => $plato, 'id_menu' => $menu, 'precio' => 0],
        ]);
    }

    /**
     * quita un plato de un menu
     *
     * @param  \Illuminate\Http\Request recibe el identificador del plato y del menu
     * 
     */
    public function quitarPlato(Request $request)
    {
        $plato = $request->plato;
        $menu = $request->menu;

        DB::table('menu_platos')->where('id_menu', $menu)->where('id_plato', $plato)->delete();
    }

    /**
     * devuelve un formulario para modificar el precio de un plato en un menu concreto
     *
     * @param  int  $menu identificador del menu
     * @param  int  $plato identificador del plato
     * @return \Illuminate\Http\Response devuelve un formulario para modificar el precio
     */
    public function precioPlato($menu, $plato)
    {

        $menu = Menu::find($menu);
        $plato = Plato::find($plato);
        return view('administrador.editarPrecioPlato', compact('plato', 'menu'));
    }


    /**
     * actualiza el precio de un plato en un menu concreto
     * 
     * @param  \Illuminate\Http\Request  $request informacion del menu y del plato
     * 
     * @return \Illuminate\Http\Response una vista con todos los platos de un menu
     */
    public function updatePrecio(Request $request)
    {
        $menu = Menu::find($request->menu);
        $plato = Plato::find($request->plato);
        $precio = $request->precio;

        DB::table('menu_platos')->where('id_menu', $menu->id)->where('id_plato', $plato->id)->update(['precio' => $precio]);

        return redirect("/administrador/menus/platos/$menu->id");
    }

    /**
     * devuelve los platos de un menu filtrados segun unas condiciones
     *
     *  @param  \Illuminate\Http\Request  el menu y los criterios sobre los que se va ha filtrar 
     * @return \Illuminate\Http\Response una vista para la realizacion de pedidos con los platos ya filtrados
     */
    public function filtrar(Request $request)
    {
        $menu = $request->menu; //menu del restaurante
        $nombre = $request->nombre; // nombre del plato por el que se hace la busqueda
        $categoria = $request->categoria; //categoria del plato por la que se hace la busqueda

        $menu = Menu::find($menu);

        $platos = $menu->platos;

        //si no se especifica la categoria se devolveran los platos de todas las categorias; en caso contrario se devolveran los platos de la categoria especificada
        if ($categoria != 0) {

            $platos = $platos->where('id_categoria', $categoria);
        }

        //en caso de no especificar el nombre del plato se devolveran todos los platos sin importar su nombre, en caso contrario se devolveran los platos cuyo nombre coincida con el indicado
        if (!$nombre == '') {
            $platos = $platos->where('nombre', $nombre);
        }

        $contenido = '';
        //se alamcenan todos los platos en una variable junto con toda la estructura de etiquetas y sen envian ala vista de realizacion de pedidos
        foreach ($platos as $plato) {
            $contenido .= " <div class='container bg-white plato seleccionable' data-id='" . $plato->id . "' data-categoria='" . $plato->categoria->nombre . "' data-nombre='" . $plato->nombre . "' data-precio='" . $plato->pivot->precio . "' data-imagen='URL::to('" . '/' . "')/images/" . $plato->imagen . "'>
                            <div class='row'>
                                <div class='col-6 my-3'>
                                    <img src='{{ URL::to('/') }}/images/" . $plato->imagen . "'>
                                </div>
                                <div class='col-6 my-3'>
                                    <p><strong>Nombre:</strong> {$plato->nombre}</p>
                                    <p><strong>Categoria:</strong> {$plato->categoria->nombre}</p>
                                    <p><strong>Precio: </strong>{$plato->pivot->precio}€</p>
                                </div>
                            </div>

                        </div>
                        <hr>";
        }




        return response()->json(['success' => $contenido]);
    }
}
